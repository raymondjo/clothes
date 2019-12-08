<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function offers()
    {
        return $this->belongsToMany('App\Models\Offer', 'product_offer');
    }

    // relation with product one to many
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
