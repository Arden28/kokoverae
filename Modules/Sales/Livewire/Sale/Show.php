<?php

namespace Modules\Sales\Livewire\Sale;

use Livewire\Component;
use Modules\Sales\Entities\Quotation\Quotation;
use Modules\Sales\Entities\Quotation\QuotationDetails;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Sales\Entities\Sale;
use Modules\Sales\Entities\SalesDetail;
use Modules\Sales\Entities\SalesPayment;
use Modules\Sales\Entities\SalesTeam;
use Modules\Contact\Entities\Contact;
use Modules\Invoicing\Entities\Customer\Invoice;
use Modules\Invoicing\Entities\Customer\InvoiceDetails;
use Carbon\Carbon;

class Show extends Component
{
    public Sale $sale;

    public $cartInstance = 'sale';

    public $customer, $customer_name,

    $date,

    $expected_date,

    $payment_term ,
    $reference,
    $tax_percentage,
    $tax_amount,
    $discount_percentage,
    $discount_amount,
    $shipping_amount,
    $paid_amount = 0,
    $due_amount = 0,
    $total_amount = 0,
    $payment_method,
    $payment_status,
    $status,
    $note,

    $seller,

    $sellers = [],

    $sales_team,

    $sales_teams = [],

    $tags,

    $shipping_policy,

    $shipping_date,

    $shipping_status,

    $tag;
    // public $qty = 1;

    protected $rules = [
        'customer' => 'required',
        'date' => 'required',
        'expected_date' => 'nullable',
        'payment_term' => 'required',
        'tax_percentage' => 'nullable|integer|min:0|max:100',
        'discount_percentage' => 'nullable|integer|min:0|max:100',
        'shipping_amount' => 'nullable|numeric',
        'total_amount' => 'nullable|numeric',
        'status' => 'nullable|string|max:255',
        'note' => 'nullable|string|max:1000',
        'seller' => 'nullable',
        'sales_team' => 'nullable',
        'tags' => 'nullable',
        'shipping_policy' => 'nullable',
        'shipping_date' => 'nullable',
        'shipping_status' => 'nullable|string',
    ];

    public function mount(Sale $sale){

        // Cart::instance('quotation')->destroy();

        Cart::instance('sale')->destroy();

        $this->sale= $sale;
            // Set values
            $this->customer = $sale->customer_id;
            $this->customer_name = Contact::findOrFail($sale->customer_id)->name;
            $this->date = $sale->date;
            $this->expected_date = $sale->expected_date;
            $this->payment_term = $sale->payment_term;
            $this->payment_status = $sale->payment_status;
            $this->payment_method = $sale->payment_method;
            $this->reference = $sale->reference;
            $this->tax_percentage = $sale->tax_percentage;
            $this->tax_amount = $sale->tax_amount;
            $this->discount_percentage = $sale->discount_percentage;
            $this->shipping_amount = $sale->shipping_amount;
            $this->total_amount = $sale->total_amount;
            $this->paid_amount = $sale->paid_amount;
            $this->due_amount = $sale->total_amount;
            $this->status = $sale->status;
            $this->note = $sale->note;
            $this->seller = $sale->seller_id;
            $this->sales_team = $sale->sales_team_id;
            $this->tags = $sale->tags;
            $this->shipping_date = $sale->shipping_date;
            $this->shipping_policy = $sale->shipping_policy;
            $this->shipping_status = $sale->shipping_status;

            // Update the cart
            $sale_details = $sale->saleDetails;



            $cart = Cart::instance('sale');

            foreach ($sale_details as $sale_detail) {
                $cart->add([
                    'id'      => $sale_detail->product_id,
                    'name'    => $sale_detail->product_name,
                    'qty'     => $sale_detail->quantity,
                    'price'   => $sale_detail->price / 100,
                    'weight'  => 1,
                    'options' => [
                        'product_discount' => $sale_detail->product_discount_amount / 100,
                        'product_discount_type' => $sale_detail->product_discount_type,
                        'sub_total'   => $sale_detail->sub_total / 100,
                        'code'        => $sale_detail->product_code,
                        'stock'       => Product::findOrFail($sale_detail->product_id)->product_quantity,
                        'product_tax' => $sale_detail->product_tax_amount,
                        'unit_price'  => $sale_detail->unit_price / 100
                    ]
                ]);

                // $cart->destroy();
            }
    }
    public function render()
    {
        $contacts = Contact::isCompany(current_company()->id)->get();
        $invoices = Invoice::isCompany(current_company()->id)->isSale($this->sale->id)->get();
        return view('sales::livewire.sale.show', compact('contacts', 'invoices'))
        ->extends('layouts.master');
        // ->section('content');
    }

    public function updateSale(Sale $sale){

        $due_amount = $this->total_amount - $this->paid_amount;

        if ($due_amount == $this->total_amount) {
            $this->payment_status = 'Unpaid';
        } elseif ($due_amount > 0) {
            $this->payment_status = 'Partial';
        } else {
            $this->payment_status = 'Paid';
        }

        foreach ($sale->saleDetails() as $sale_detail) {
            if ($sale->shipping_status == 'Shipped' || $sale->shipping_status == 'Completed') {
                $product = Product::findOrFail($sale_detail->product_id);
                $product->update([
                    'product_quantity' => $product->product_quantity + $sale_detail->quantity
                ]);
            }
            $sale_detail->delete();
        }
        DB::transaction(function() use ($sale) {

            $sale->update([
                'date' => $this->date,
                'payment_status' => $this->payment_status,
                'payment_term' => $this->payment_term,
                'payment_method' => $this->payment_method,
                'seller_id' => $this->seller, //customer id
                'sales_team_id' => $this->sales_team, //customer id
                'customer_id' => 1, //customer id
                'tax_percentage' => 18.9,
                'discount_percentage' => 0,
                'shipping_amount' => 0,
                'shipping_date' => $this->shipping_date,
                'shipping_policy' => $this->shipping_policy,
                'shipping_status' => $this->shipping_status,
                'total_amount' => $this->total_amount / 100,
                'paid_amount' => $this->paid_amount,
                'due_amount' => $this->total_amount / 100, //$due_amount
                'status' => 'to_invoice',
                // 'status' => $this->status,
                'note' => $this->note,
                'tax_amount' => $this->tax_amount,
                'discount_amount' => 0,
            ]);

            // Cart::instance('sale')->destroy();

            // $cart = Cart::instance('sale');

            foreach (Cart::instance('sale')->content() as $cart_item) {

                SalesDetail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $cart_item->id,
                    'product_name' => $cart_item->name,
                    'product_code' => $cart_item->options->code,
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price * 100,
                    'unit_price' => $cart_item->options->unit_price * 100,
                    'sub_total' => $cart_item->options->sub_total * 100,
                    'product_discount_amount' => $cart_item->options->product_discount * 100,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                    'product_tax_amount' => $cart_item->options->product_tax * 100,
                ]);

                if ($this->shipping_status == 'Shipped' || $this->shipping_status == 'Completed') {
                    $product = Product::findOrFail($cart_item->id);
                    $product->update([
                        'product_quantity' => $product->product_quantity - $cart_item->qty
                    ]);
                }
            }

            Cart::instance('sale')->destroy();


        });
    }

    // #[On('productSelected')]
    public function canceled(Sale $sale){

        $sale->update([
            'status' => 'canceled',
        ]);
        $sale->save();

        $this->status = 'canceled';
        // $this->dispatch('canceledQuotation', $quotation);
    }

    // Create Invoice
    public function createInvoice(Sale $sale){

        $invoice = Invoice::create([
            'company_id' => $sale->company_id,
            'sale_id' => $sale->id,
            'customer_id' => $sale->customer_id,
            'reference' => 'INV/'.$sale->reference,
            'date' => $sale->date,
            'due_date' => $sale->expected_date,
            'shipping_date' => $sale->shipping_date,
            'payment_term' => $sale->payment_term,
            'seller_id' => $sale->seller_id,
            'terms' => $sale->terms,
            'total_amount' => $sale->total_amount * 100,
            'paid_amount' => $sale->paid_amount * 100,
            'due_amount' => $sale->due_amount * 100,
            'status' => 'draft',
            'payment_status' => '',
            'to_checked' => false,
        ]);
        $invoice->save();

        $sale->update([
            'status' => 'invoiced',
        ]);

        // $invoiceDetails = $invoice->invoiceDetails;
            $sale_details = $sale->saleDetails;

        foreach ($sale_details as $detail) {
            //Create sale from quotation view without create quotation
            invoiceDetails::create([
                'customer_invoice_id' => $invoice->id,
                'product_id' => $detail->product_id,
                'label' => $detail->product_name,
                'product_name' => $detail->product_name,
                'quantity' => $detail->quantity,
                'price' => $detail->price,
                'unit_price' => $detail->unit_price,
                'sub_total' => $detail->sub_total,
                'product_discount_amount' => $detail->product_discount_amount,
                'product_discount_type' => $detail->product_discount_type,
                'product_tax_amount' => $detail->product_tax_amount,
            ]);

            return $this->redirect(route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id, 'invoice' => $invoice->id]), navigate:true);
        }
    }

}
