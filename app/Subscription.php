<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $fillable = [
        'plan','price','subscribe_start_date','subscribe_end_date'
    ];


    protected $fillabe = ['dates'];


    public function users(){
        return $this->belongsToMany('App\User', 'subscribe_user', 'subscribe_id', 'user_id')->withPivot('subscribe_id', 'user_id');
    }
}
