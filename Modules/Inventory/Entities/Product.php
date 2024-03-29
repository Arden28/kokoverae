<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\ProductFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Modules\Purchase\Entities\PurchaseDetail;
use Modules\Sales\Entities\SalesDetail;

class Product extends Model implements Buyable
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // protected $with = ['media'];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    // Cart
    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->name;
    }

    public function getBuyablePrice($options = null) {
        return $this->price;
    }

    // Get Quotation's details
    public function bought() {
        return $this->hasMany(PurchaseDetail::class, 'product_id', 'id');
    }

    public function sold() {
        return $this->hasMany(SalesDetail::class, 'product_id', 'id');
    }

}
