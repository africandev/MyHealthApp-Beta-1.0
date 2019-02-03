<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    // Table Name
    protected $table = 'recipes';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function diseases(){
        return $this->belongsToMany('App\Disease');
    }

    public function recipetype() {
        return $this->hasOne('App\RecipeType');
    }

    public function ingredients(){
        $this->hasMany('App\Ingredient');
    }
}
