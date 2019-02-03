<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $fillable = [
        'name',
        'title',
        'body',
        'user_id',
        'disease_id',
        'biomass',
        'small_image',
        'cover_image',
    ];

    public function diseases(){
        return $this->belongsTo('App\Disease');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
