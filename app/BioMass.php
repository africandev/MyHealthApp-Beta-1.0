<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class BioMass extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'user_id', 'mass', 'mass_unit', 'height', 'height_unit'
    ];

    public function user(){
    	return $this->belongsToMany('App\User');
    }
}
