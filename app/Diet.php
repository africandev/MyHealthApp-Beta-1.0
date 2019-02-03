<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    protected $table = 'diets';

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function steps(){
        return $this->hasMany('App\Step');
    }

}
