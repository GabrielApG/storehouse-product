<?php

namespace ResultSystems\Storehouse\Product\Models;

use Illuminate\Database\Eloquent\Model;

class StorehouseProduct extends Model
{
    protected $fillable=['name','description','current_inventory','minimum_inventory','unit'];

    public function categories()
    {
        return $this->belongsToMany(
            'ResultSystems\Storehouse\Product\Models\StorehouseProductCategory',
            'storehouse_product_has_categories',
            'storehouse_product_id',
            'storehouse_product_category_id'
            )->withTimestamps();
    }
    public function suppliers()
    {
        return $this->belongsToMany(
            config('storehouse-product.supplier.model'),
            'storehouse_product_has_suppliers',
            'storehouse_product_supplier_id',
            config('storehouse-product.supplier.key')
            )->withTimestamps();
    }
}
