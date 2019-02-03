<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    // Table Name
    protected $fillable = [
        'name', 'title', 'information', 'additional' ];


//Models Relationships
    public function user(){
        return $this->belongsToMany('App\User');
    }

    public function recipes(){
        return $this->hasMany('App\Recipe');
    }

    public function tips(){
        return $this->hasMany('App\Tip');
    }

}
