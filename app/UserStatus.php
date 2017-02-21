<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{

    public function users(){
        return $this->hasMany('App\User', 'user_status_id');
    }
}
