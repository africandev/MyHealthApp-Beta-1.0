<?php

namespace App\Http\Controllers\Modules;

use Form;
use App\Recipe;
use App\Biomass;
use App\Disease;
use App\Ingredient;
use App\RecipeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $diseases = Disease::all();
        $other_recipes = Recipe::inRandomOrder()->get();
        $recipetypes = RecipeType::all();
        return view('recipes.index')->with(compact('other_recipes', 'recipetypes', 'diseases', 'biomass'));
    }



    public function create()
    {
        $diseases = Disease::all();
        $recipetypes = RecipeType::all();
        return view('recipes.create')->with(compact('diseases', 'recipetypes'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'headline' => 'required',
            'body' => 'required',
            'disease_id' => '',
            'type_id' => 'integer|required',
            'preparation_time' => 'integer|required',
            'cooking_time' => 'integer|required',
            'level' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'small_image' => 'image|nullable|max:1999',
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExta = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filenamea = pathinfo($filenameWithExta, PATHINFO_FILENAME);
            // Get just ext
            $extensiona = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStorea= $filenamea.'_'.time().'.'.$extensiona;
            // Upload Image
            $patha = $request->file('cover_image')->storeAs('public/recipes/cover_image', $fileNameToStorea);
        } else {
            $fileNameToStorea = 'nocoverimage.jpg';
        }


        if($request->hasFile('small_image')){
            // Get filename with the extension
            $filenameWithExtb = $request->file('small_image')->getClientOriginalName();
            // Get just filename
            $filenameb = pathinfo($filenameWithExtb, PATHINFO_FILENAME);
            // Get just ext
            $extensionb = $request->file('small_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStoreb= $filenameb.'_'.time().'.'.$extensionb;
            // Upload Image
            $pathb = $request->file('small_image')->storeAs('public/recipes/small_image', $fileNameToStoreb);
        } else {
            $fileNameToStoreb = 'nosmallimage.jpg';
        }

        // Create Recipe
        $recipe = new Recipe;
        $recipe->user_id = auth()->user()->id;
        $recipe->title = $request->input('title');
        $recipe->headline = $request->input('headline');
        $recipe->body = $request->input('body');
        $recipe->disease_id = $request->input('disease_id');
        $recipe->biomass = $request->input('biomass');
        $recipe->for = $request->input('for');
        $recipe->type_id = $request->input('type_id');
        $recipe->preparation_time = $request->input('preparation_time');
        $recipe->cooking_time = $request->input('cooking_time');
        $recipe->level = $request->input('level');
        $recipe->cover_image = $fileNameToStorea;
        $recipe->small_image = $fileNameToStoreb;
        $recipe->save();
        return redirect('/recipes')->with('success', 'Added Succesfully to the DB.');
    }



    public function show($id)
    {
        $recipe = Recipe::find($id);
        if($recipe->level == 1){
            $level = 'Facile';
        }elseif($recipe->level == 2){
            $level = 'Moyen';
        }else{
            $level = 'Avancé';
        }

        $ingredients = Ingredient::where('recipe_id', $id)->orderBy('id', 'asc')->get();
        return view('recipes.show')->with(compact('recipe', 'level', 'ingredients'));
    }



    public function edit($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.edit')->with('recipe', $recipe);
        
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/recipes/cover_image', $fileNameToStore);
        }

        if($request->hasFile('small_image')){
            // Get filename with the extension
            $filenameWithExtb = $request->file('small_image')->getClientOriginalName();
            // Get just filename
            $filenameb = pathinfo($filenameWithExtb, PATHINFO_FILENAME);
            // Get just ext
            $extensionb = $request->file('small_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStoreb= $filenameb.'_'.time().'.'.$extensionb;
            // Upload Image
            $pathb = $request->file('small_image')->storeAs('public/recipes/small_image', $fileNameToStoreb);
        }

        // Create Recipe
        $recipe = Recipe::find($id);
        $recipe->title = $request->input('title');
        $recipe->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $recipe->cover_image = $fileNameToStore;
        }
        $recipe->save();

        return redirect('/recipes')->with('success', 'Recipe Updated');
    }




    public function destroy($id)
    {
        $recipe = Recipe::find($id);

        // Check for correct user
        if(auth()->user()->id !==$recipe->user_id){
            return redirect('/recipes')->with('error', 'Unauthorized Page');
        }

        if($recipe->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$recipe->cover_image);
        }

        $recipe->delete();
        return redirect('/recipes')->with('success', 'Recipe Removed');
    }

    public function addingredient(Request $request){
        $ingredient = new Ingredient;
        $ingredient->name = $request->input('name');
        $ingredient->quantity = $request->input('quantity');
        $ingredient->recipe_id = $request->input('recipe_id');
        $ingredient->save();
        return back();
    }
}
