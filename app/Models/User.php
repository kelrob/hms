<?php

namespace App\Models;
use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{

    protected $table = 'users';

    public function userProfile() {
        return $this->hasOne('App\Models\UserProfile');
    }

    public function appointment() {
        return $this->hasMany('App\Models\Appointment');
    }

    public function prescription() {
        return $this->hasMany('App\Models\Prescription');
    }
}
