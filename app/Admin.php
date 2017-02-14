<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    protected $connection = 'mysql_external';

    protected $table = 'admins';

    protected $fillable = [
        'name', 'email', 'password','photo_name'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $uploads = "/admin_photo/";

    public function getPhotoNameAttribute($photo){
        return $this->uploads . $photo;
    }


    public function getName(){
        return $this->name;
    }

    public function getNameAttribute($value){
        return ucfirst($value);
    }
}
