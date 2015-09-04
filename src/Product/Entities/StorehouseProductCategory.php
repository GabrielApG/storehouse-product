<?php

namespace ResultSystems\Storehouse\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class StorehouseProductCategory extends Model
{
    protected $fillable = ['name', 'description'];
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
    public function products()
    {
        return $this->hasMany('ResultSystems\Storehouse\Product\Entities\StorehouseProduct');
    }
}
