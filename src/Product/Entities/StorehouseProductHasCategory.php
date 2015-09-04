<?php

namespace ResultSystems\Storehouse\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class StorehouseProductHasCategory extends Model
{
    protected $table = 'storehouse_product_has_categories';
    public function products()
    {
        return $this->belongsToMany('ResultSystems\Storehouse\Product\Entities\StorehouseProduct', 'product_id', 'category_id');
    }
    /*
public static function boot()
{
parent::boot();
static::creating(function ($model) {
$user = \Auth::user();
$model->created_by = $user->id;
$model->updated_by = $user->id;
});
static::updating(function ($model) {
$model->updated_by = \Auth::user()->id;
});
}
 */
}
