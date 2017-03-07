<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Adspace extends Model
{

    protected $fillable = [
        'photo_name', 'owner_id', 'adspace_type', 'size', 'location', 'price', 'status', 'reserve','advertising_type','posted_by', 'reserve_until'
    ];

    protected $uploads = "/post_owner_images/";

    public function getPhotoNameAttribute($photo){
        return $this->uploads . $photo;
    }
    public function user(){
         return $this->belongsTo('App\User', 'owner_id');
    }


    //check kung nag pa reserve naba xa ana nga billboard
    public function scopeRent($query){

    }

    //check kung nag pa reserve naba xa ana nga billboard
    public function scopeSale($query){

    }

    public function scopeLatest($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }


    public function scopeLamp($query)
    {
        return $query->where('adspace_type', 'lamp');
    }

    public function scopeBus($query)
    {
        return $query->where('adspace_type', 'bus');
    }

    public function scopeBillboard($query)
    {
        return $query->where('adspace_type', 'billboard');
    }

    public function scopeLed($query)
    {
        return $query->where('adspace_type', 'led');
    }

    public function scopeJeep($query)
    {
        return $query->where('adspace_type', 'jeep');
    }

    public function scopeTaxi($query)
    {
        return $query->where('adspace_type', 'taxi');
    }

    public function scopePoster($query)
    {
        return $query->where('adspace_type', 'poster');
    }




    public function scopeAvailable($query)
    {
        return $query->where('status', 1);
    }

    public function scopeNotreserved($query)
    {
        return $query->where('reserve', 0);
    }

//    public function scopePublished($query){
//        return $query->where('published_at', '<=', Carbon::now());
//    }

    public function rents(){
         return $this->belongsToMany('App\Rent', 'adspace_rent', 'adspace_id', 'rent_id')->withPivot('rent_id','adspace_id');
    }

    public function reservations(){
        return $this->belongsToMany('App\Reservation', 'adspace_reservation', 'adspace_id','reservation_id')->withPivot('adspace_id','reservation_id');
    }

    public function sales(){
        return $this->belongsToMany('App\Sale', 'adspace_sale', 'adspace_id', 'sale_id')->withPivot('adspace_id', 'sale_id');
    }
}
