<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Adspace extends Model
{

    protected $fillable = [
        'photo_name', 'owner_id', 'adspace_type', 'size', 'location', 'price', 'status', 'reserve','advertising_type','posted_by'
    ];

    protected $uploads = "/post_owner_images/";

    public function getPhotoNameAttribute($photo){
        return $this->uploads . $photo;
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('updated_at', 'desc');
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
         return $this->belongsToMany('App\Rents');
    }

}
