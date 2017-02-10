<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email','address', 'contact', 'role_id','password',
    ];





    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function isAdmin()
    {
        if ($this->role_id == 1) {
            return true;
        }
        return false;
    }

    public function can_post() {
        $role = $this->role;
        if($role == 'owner') {
            return true;
        }
        return false;
    }

    public function ad_spaces(){
        return $this->hasMany('App\Adspace', 'owner_id');
    }

    public function client_rents(){
         return $this->hasMany('App\Rent', 'client_id');
    }

    public function owner_rents(){
        return $this->hasMany('App\Rent', 'owner_id');
    }


}
