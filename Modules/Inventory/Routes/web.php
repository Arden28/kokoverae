<?php

use Illuminate\Support\Facades\Route;
use Modules\Inventory\Http\Controllers\InventoryController;
use Modules\Inventory\Livewire\Adjustment\Physical\Lists as AdjustmentLists;
use Modules\Inventory\Livewire\Adjustment\Physical\Create as AdjustmentCreate;
use Modules\Inventory\Livewire\Adjustment\Physical\Show as AdjustmentShow;

use Modules\Inventory\Livewire\Adjustment\Scrap\Lists as AdjustmentScrapLists;
use Modules\Inventory\Livewire\Adjustment\Scrap\Create as AdjustmentScrapCreate;
use Modules\Inventory\Livewire\Adjustment\Scrap\Show as AdjustmentScrapShow;

use Modules\Inventory\Livewire\OperationTransfer\Lists as OperationsTransferLists;
use Modules\Inventory\Livewire\OperationTransfer\Create as OperationsTransferCreate;
use Modules\Inventory\Livewire\OperationTransfer\Show as OperationsTransferShow;

use Modules\Inventory\Livewire\OperationType\Create as OperationTypeCreate;
use Modules\Inventory\Livewire\OperationType\Lists as OperationTypeList;
use Modules\Inventory\Livewire\OperationType\Show as OperationTypeShow;
use Modules\Inventory\Livewire\Overview;

use Modules\Inventory\Livewire\Product\Category\Lists as CategoryLists;
use Modules\Inventory\Livewire\Product\Category\Create as CategoryCreate;
use Modules\Inventory\Livewire\Product\Category\Show as CategoryShow;

use Modules\Inventory\Livewire\Product\Lists as ProductLists;
use Modules\Inventory\Livewire\Product\Create as ProductCreate;
use Modules\Inventory\Livewire\Product\Show as ProductShow;

use Modules\Inventory\Livewire\Warehouse\Lists as WarehouseList;
use Modules\Inventory\Livewire\Warehouse\Create as WarehouseCreate;
use Modules\Inventory\Livewire\Warehouse\Show as WarehouseShow;
use Modules\Inventory\Livewire\Warehouse\Routes\Lists as WarehouseRouteList;
use Modules\Inventory\Livewire\Warehouse\Routes\Show as WarehouseRouteShow;

use Modules\Inventory\Livewire\Location\Lists as LocationList;
use Modules\Inventory\Livewire\Location\Create as LocationCreate;
use Modules\Inventory\Livewire\Location\Show as LocationShow;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['module:inventory'])->group(function() {

    // Inventory
    Route::get('inventory', Overview::class)->name('inventory.index');

    // Operations
    Route::get('inventory/operation-tranfers', OperationsTransferLists::class)->name('inventory.operation-transfers.index');
    Route::get('inventory/operation-types', OperationTypeList::class)->name('inventory.operation-types.index');

    // Adjustments
    Route::get('inventory/adjustment/physicals', AdjustmentLists::class)->name('inventory.adjustments.physical.index');

    // Adjustments Scraps
    Route::get('inventory/adjustment/scraps', AdjustmentScrapLists::class)->name('inventory.adjustments.scraps.index');

    // Products
    Route::get('inventory/products', ProductLists::class)->name('inventory.products.index');
    // Categories
    Route::get('inventory/products/categories', CategoryLists::class)->name('inventory.products.categories.index');

    // Warehouse
    Route::get('inventory/warehouses', WarehouseList::class)->name('inventory.warehouses.index');
    // WarehouseRoute
    Route::get('inventory/warehouses-routes', WarehouseRouteList::class)->name('inventory.warehouses.routes.index');
    // Locations
    Route::get('inventory/locations', LocationList::class)->name('inventory.locations.index');

    Route::prefix('inventory')->name('inventory.')->group(function(){
        // Operations
        Route::get('operation-types/create', OperationTypeCreate::class)->name('operation-types.create');
        Route::get('operation-types/{type}', OperationTypeShow::class)->name('operation-types.show');
        // Operations Transfers
        Route::get('operation-transfers/create', OperationsTransferCreate::class)->name('operation-transfers.create');
        Route::get('operation-transfers/{transfer}', OperationsTransferShow::class)->name('operation-transfers.show');
        // Categories
        Route::get('products/categories/create', CategoryCreate::class)->name('products.categories.create');
        Route::get('products/categories/{category}', CategoryShow::class)->name('products.categories.show');
        // Products
        Route::get('products/create', ProductCreate::class)->name('products.create');
        Route::get('products/{product}', ProductShow::class)->name('products.show');
        // Warehouse
        Route::get('warehouses/create', WarehouseCreate::class)->name('warehouses.create');
        Route::get('warehouses/{warehouse}', WarehouseShow::class)->name('warehouses.show');
        // WarehouseRoute
        Route::get('warehouses-routes/{route}', WarehouseRouteShow::class)->name('warehouses.routes.show');
        // Locations
        Route::get('locations/create', LocationCreate::class)->name('locations.create');
        Route::get('locations/{location}', LocationShow::class)->name('locations.show');
        // Scraps
        Route::get('adjustment/scraps/create', AdjustmentScrapCreate::class)->name('adjustments.scraps.create');
        Route::get('adjustment/scraps/{scrap}', AdjustmentScrapShow::class)->name('adjustments.scraps.show');
        // Adjustment
        Route::get('adjustment/physicals/create', AdjustmentCreate::class)->name('adjustments.create');
        Route::get('adjustment/physicals/{adjustment}', AdjustmentShow::class)->name('adjustments.show');
    });

});
