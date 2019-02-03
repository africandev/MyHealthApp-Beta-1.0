<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $table = 'steps';

    public function diet(){
        return $this->belongsTo('App\Diet');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
