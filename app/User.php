<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email','address', 'contact', 'role_id','password', 'photo_name',
    ];


    protected $fillabe = ['dates'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $uploads = "/user_photo/";

    public function isSubscribe(){

        $exists = DB::table('subscribe_user')
                ->whereUserId(Auth::user()->id)
                ->count() > 0;

        $isOk = true;
        $user = User::findOrFail(Auth::user()->id);

        foreach ($user->subscriptions as $subscription) {
            if ($subscription->subscribe_end_date < \Carbon\Carbon::now()){
                $isOk = false;
            }
        }

        if ($exists && $isOk){
            return true;
        }else{
            return false;
        }
    }

    public function isOwner(){
        if ($this->role_id == 3 && $this->user_status_id == 1){
            return true;
        }else{
            return false;
        }
    }


    public function isClient(){
        if ($this->role_id == 2 && $this->user_status_id == 1){
            return true;
        }else{
            return false;
        }
    }

    public function getPhotoNameAttribute($photo){
        return $this->uploads . $photo;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function userStatus()
    {
        return $this->belongsTo('App\UserStatus');
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

    public function client_reserves(){
        return $this->hasMany('App\Reservation','client_id');
    }

    public function owner_reserves(){
        return $this->hasMany('App\Reservation','owner_id');
    }

    public function client_rents(){
        return $this->hasMany('App\Rent', 'client_id');
    }

    public function owner_rents(){
        return $this->hasMany('App\Rent', 'owner_id');
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function subscriptions(){
        return $this->belongsToMany('App\Subscription', 'subscribe_user', 'user_id', 'subscribe_id')->withPivot('user_id', 'subscribe_id');
    }


}
