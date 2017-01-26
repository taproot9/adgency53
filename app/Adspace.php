<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adspace extends Model
{

    protected $fillable = [
        'photo_name', 'owner_id', 'type', 'size', 'location', 'price', 'rent_price', 'status', 'posted_by'
    ];

    protected $uploads = "/post_owner_images/";

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }

}
