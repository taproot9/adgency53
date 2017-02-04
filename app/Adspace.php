<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Adspace extends Model
{

    protected $fillable = [
        'photo_name', 'owner_id', 'type', 'size', 'location', 'price', 'rent_price', 'status', 'reserve','posted_by'
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

}
