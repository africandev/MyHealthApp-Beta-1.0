<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeType extends Model
{
    protected $table = 'recipetypes';

    public function recipes() {
        return $this->belongsToMany('App\Recipe');
    }
}
