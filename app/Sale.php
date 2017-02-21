<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'sale_date', 'owner_id', 'client_id', 'is_seen','billboard_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function ad_spaces(){
        return $this->belongsToMany('App\Adspace', 'adspace_sale', 'sale_id', 'adspace_id')->withPivot('adspace_id', 'sale_id');
    }
}
