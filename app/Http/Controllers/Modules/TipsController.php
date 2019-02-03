<?php

namespace App\Http\Controllers\Modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Biomass;
use App\Tip;

class TipsController extends Controller
{

    public function index()
    {
        $tips = Tip::orderBy('created_at', 'desc')->paginate(10);
        return view('tips.index')->with('tips', $tips);
    }


    public function create()
    {
        return view('tips.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'integer|required',
            'disease_id' => 'integer|required',
            'biomass' => 'integer|required',
            'small_image' => 'image|nullable|max:1999',
            'cover_image' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('small_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('small_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('small_image')->getClientOriginalExtension();
            // Filename to store
            $smallNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('small_image')->storeAs('public/small_image', $smallNameToStore);
        } else {
            $smallNameToStore = 'noimage.jpg';
        }

        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $coverNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $coverNameToStore);
        } else {
            $coverNameToStore = 'noimage.jpg';
        }

        $tip = new Tip;
        $tip->name = $request->input('name');
        $tip->title = $request->input('title');
        $tip->body = $request->input('body');
        $tip->user_id = Auth::user()->id;
        $tip->disease_id = $request->input('disease_id');
        $tip->biomass = $request->input('biomass');
        $tip->small_image = $smallNameToStore;
        $tip->cover_image = $coverNameToStore;
        $tip->save();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}




/*
$user = Auth::user();
        $disease_id = $user->diseases()->pluck('disease_id');
        $biorow = BioMass::where('user_id', '=', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();

        foreach($biorow as $biorow){
            $mass = $biorow->mass;
            $height = $biorow->height;
        }

        $biomass = $mass / ($height * $height);

        //BioRanker Algorithm
        if(count(Auth::user()->diseases) == 0){
            $recipes = Tip::whereIn('disease_id', $disease_id)->get();
            if($biomass >= 25.0){
                $recipes = Tip::where([
                    ['obesity', '=', '3'],
                ])->get();
                $message = "more than 25";
            }elseif($biomass < 18.5){
                $recipes = Tip::where([
                    ['obesity', '=', '1'],
                ])->get();
                $message = "less than 18.5";
            }else{
                $recipes = Tip::inRandomOrder()->get();
                $message = "normal";
            }
        }

        elseif(count(Auth::user()->diseases) > 0){
            if($biomass >= 25.0){
                $recipes = Tip::where([
                    ['obesity', '=', '3'],
                    ['disease_id', '=', $disease_id],
                ])->get();
                $message = "more than 25";
            }elseif($biomass < 18.5){
                $recipes = Tip::where([
                    ['obesity', '=', '1'],
                    ['disease_id', '=', $disease_id],
                ])->get();
                $message = "less than 18.5";
            }else{
                $recipes = Tip::where([
                    ['obesity', '=', '2'],
                    ['disease_id', '=', $disease_id],
                ])->get();
                $message = "normal";
            }
        }





        //$recipe = Recipe::has('diseases')->where('disease_id', '=', $disease_id)->get();
        return view('tips.index')->with('recipes', $recipes);
*/
