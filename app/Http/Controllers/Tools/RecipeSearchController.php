<?php

namespace App\Http\Controllers\Tools;

use App\Recipe;
use App\BioMass;
use App\Disease;
use App\RecipeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecipeSearchController extends Controller
{
    public function my(){
        $user = Auth::user();
        $disease_id = $user->diseases()->pluck('disease_id');
        $biorow = BioMass::where('user_id', '=', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();

        if(count($biorow) == 0){
            $biomass = NULL;
        }else{
            foreach($biorow as $biorow){
                $mass = $biorow->mass;
                $height = $biorow->height;
            }
            $biomass = $mass / ($height * $height);
        }

        //BioRanker Algorithm
        if(count(Auth::user()->diseases) == 0){
            $recipes = Recipe::whereIn('disease_id', $disease_id)->get();
            if($biomass >= 25.0){
                $recipes = Recipe::where([
                    ['biomass', '=', '3'],
                ])->get();
                $message = "more than 25";
            }elseif($biomass < 18.5){
                $recipes = Recipe::where([
                    ['biomass', '=', '1'],
                ])->get();
                $message = "less than 18.5";
            }else{
                $recipes = Recipe::inRandomOrder()->get();
                $message = "normal";
            }
        }

        elseif(count(Auth::user()->diseases) > 0){
            if($biomass >= 25.0){
                $recipes = Recipe::where([
                    ['biomass', '=', '3'],
                    ['disease_id', '=', $disease_id],
                ])->get();
                $message = "more than 25";
            }elseif($biomass < 18.5){
                $recipes = Recipe::where([
                    ['biomass', '=', '1'],
                    ['disease_id', '=', $disease_id],
                ])->get();
                $message = "less than 18.5";
            }else{
                $recipes = Recipe::where([
                    ['biomass', '=', '2'],
                    ['disease_id', '=', $disease_id],
                ])->get();
                $message = "normal";
            }
        }
        //$recipe = Recipe::has('diseases')->where('disease_id', '=', $disease_id)->get();
       
        $other_recipes = Recipe::inRandomOrder()->get();
        $diseases = Disease::all();
        $recipetypes = RecipeType::all();
        return view('recipes.my')->with(compact('modal_name', 'recipes', 'recipetypes', 'diseases', 'other_recipes', 'biomass'));
    }
    
    public function bydisease() {
        $recipes = Recipe::where('disease_id', '=', $_GET['disease'])->get();
        return $recipes;
    }

    public function bytype(){
        $type = RecipeType::where('id', '=', $_GET['type'])->take(1)->get();
        $recipes = Recipe::where('type_id', '=', $_GET['type'])->inRandomOrder()->get();
        return view('recipes.type')->with(compact('type', 'recipes'));
    }
}
