<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function savedUsers()
    {
        return $this->belongsToMany('App\Models\User', 'saved_offer');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_offer');
    }

}
