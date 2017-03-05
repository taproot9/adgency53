<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
        'rent_date', 'owner_id', 'client_id', 'is_seen','is_seen_owner', 'is_seen_client','billboard_id'
    ];

    public function user(){
         return $this->belongsTo('App\User');
    }
    public function ad_spaces(){
        return $this->belongsToMany('App\Adspace', 'adspace_rent', 'rent_id', 'adspace_id')->withPivot('adspace_id', 'rent_id');
    }
}
