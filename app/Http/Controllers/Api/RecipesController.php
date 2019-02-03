<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    public function index(){
        $recipes = Recipe::all();
    	return response()->json(['data' => $recipes], 200, [], JSON_NUMERIC_CHECK);
    }

    public function show($id)
    {
        $recipe = Recipe::find($id);
        return response()->json(['data' => $recipe], 200, [], JSON_NUMERIC_CHECK);
    }
}
