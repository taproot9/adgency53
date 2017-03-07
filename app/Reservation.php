<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'reserve_date','owner_id','client_id', 'is_seen','is_seen_owner', 'is_seen_client','billboard_id','reserve_until'
    ];

    protected $table = 'reservations';

    public function ad_spaces(){
        return $this->belongsToMany('App\Adspace', 'adspace_reservation', 'reservation_id', 'adspace_id')->withPivot('adspace_id','reservation_id');
    }


    //check kung nag pa reserve naba xa ana nga billboard
    public function scopeReserve($query){

    }

//    public function scopeBillboard($query)
//    {
//        return $query->where('adspace_type', 'billboard');
//    }

    //e show nako ang reserv
    public function scopeIsreserve($query){
         return $query->where('reserve_until','=>',Carbon::now()->format('Y-m-d'));
    }
}

