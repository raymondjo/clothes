<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'owner_id');
    }

    public function subscribers()
    {
        return $this->belongsToMany('App\Models\User', 'subscription');
    }

    // relation one to many with product
    //relation one to many with offer table
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
