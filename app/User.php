<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 
        'lastname',
        'email', 
        'country',
        'indicator',
        'phone',
        'gender',
        'height',
        'mass_unit',
        'height_unit',
        'profile_image',
        'birthday',
        'role',
        'disease',
        'language',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function diseases(){
        return $this->belongsToMany('App\Disease');
    }

    public function biomass(){
        return $this->belongsToMany('App\BioMass');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function diets(){
        return $this->belongsToMany('App\Diet');
    }

    public function steps(){
        return $this->belongsToMany('App\Step');
    }
}
