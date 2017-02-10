<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{

    protected $fillable = [
        'rent_date', 'owner_id', 'client_id'
    ];

    public function user(){
         return $this->belongsTo('App\User');
    }


    public function ad_spaces(){
        return $this->belongsToMany('App\Adspace', 'adspace_rent', 'rent_id', 'adspace_id');
//        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

}
