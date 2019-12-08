<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles; //user role and permissions

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    use HasRoles;  //user role and permissions

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shops(){
        // ex from doc: return $this->hasMany('App\Model', 'foreign_key', 'local_key');
        return $this->hasMany('App\Models\Shop', 'owner_id', 'id');
    }

    public function subscription()
    {
        return $this->belongsToMany('App\Models\Shop', 'subscription');
    }

    //relation one to many with offer table
    public function hasShops()
    {
        return $this->hasMany('App\Models\Offer');
    }

    //relation with offer for users that saved offers
    public function savedUsers()
    {
        return $this->belongsToMany('App\Models\Offer', 'saved_offer');
    }
}
