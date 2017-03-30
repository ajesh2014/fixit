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
        'name', 'email', 'password', 'firstname', 'lastname', 'usertype_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the address records associated with the user.
     */
    public function addresses()
    {
        return $this->hasMany('App\Address', 'user_id');
    }

    /**
     * Get the job records associated with the user.
     */
    public function jobs()
    {
        return $this->hasMany('App\Job', 'user_id');
    }

      /**
     * Get the user type
     */
    public function userType()
    {
        return $this->hasOne('App\UserType', 'usertype_id');
    }

}
