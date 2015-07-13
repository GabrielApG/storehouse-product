<?php

namespace ResultSystems\Storehouse\Models\Storehouse;

use ResultSystems\Person\Models\Person;

class StorehousePerson extends Person
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = \Auth::user();
            $model->created_by = $user->Id;
            $model->updated_by = $user->Id;
        });
        static::updating(function ($model) {
            $model->updated_by = \Auth::user()->Id;
        });
    }
}
