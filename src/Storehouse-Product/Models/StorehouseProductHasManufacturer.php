<?php

namespace ResultSystems\Storehouse\Product\Models;

use Illuminate\Database\Eloquent\Model;

class StorehouseProductHasManufacturer extends Model
{
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
