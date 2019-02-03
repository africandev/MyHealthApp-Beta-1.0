<?php

namespace App\Http\Controllers;

use Form;
use App\Tip;
use App\Diet;
use App\User;
use App\Recipe;
use App\BioMass;
use App\Countries;
use App\Links\DiseaseRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {


        //Biomass Calculator
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

        $recipe = Recipe::inRandomOrder()
                            ->take(1)
                            ->get();

        $tip = Tip::inRandomOrder()->take(1)->get();

        $biomasses = BioMass::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        $rows = Biomass::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->take(1)->get();
        //Check user's mass unit and converts it if necessary
        
        foreach($rows as $row){
            if(Auth::user()->mass_unit == 'kg'){
            $mass = $row->mass;
            }
            elseif(Auth::user()->mass_unit == 'lb'){
            $mass = $row->mass * 2.20462;
            }

            //Check user's height unit and converts it if necessary
            if (Auth::user()->height_unit == 'm') {
            $height = $row->height;
            }
            elseif(Auth::user()->id == 'in'){
            $height = $row->height * 39.3701;
            }

            //Calculates row's BMI (all data is in metric system)
            $result = $row->mass / ($row->height * $row->height);

            if ($result >= 25.0) {
            $diet = Diet::where('biomass', '3')->inRandomOrder()->take(1)->get();
            }
            elseif ($result < 18.5) {
                $diet = Diet::where('biomass', '1')->inRandomOrder()->take(1)->get();
            }
            else {
                $diet = Diet::inRandomOrder()->take(1)->get();
            }

        }
        return view ('my.index', compact('recipe', 'biomass', 'tip', 'diet'));
    }

    public function account() {
        $countries = Countries::all();
        $countryname = Countries::where('id', Auth::user()->country)->get();
        
        return view('my.account')->with(compact('countries', 'countryname'));
    }

    public function update(Request $request) {
        $message = array(

        );
        $this->validate($request, [
            'firstname' => 'nullable', 
            'lastname' => 'nullable', 
            'email' => 'email|nullable',
            'country' => 'nullable|integer',
            'indicator' => 'nullable|integer',
            'phone' => 'integer|nullable',
            'profile_image' => 'nullable',
            'birthday' => 'nullable',
            'language' => 'nullable',
        ], $message);

        if($request->hasFile('profile_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $user = User::find(Auth::user()->id);
        if (!empty(request()->input('firstname'))) {
            $user->firstname = $request->input('firstname');
        }
        if (!empty(request()->input('lastname'))) {
            $user->lastname = $request->input('lastname');
        }
        if (!empty(request()->input('email'))) {
            $user->email = $request->input('email');
        }  
        if (!empty(request()->input('country'))) { 
            $user->country = $request->input('country');
        }
        if (!empty(request()->input('indicator'))) {
            $user->indicator = $request->input('indicator');
        }
        if (!empty(request()->input('phone'))) {
            $user->phone = $request->input('phone');
        }
        if (!empty(request()->input('profile_image'))) {
            $user->profile_image = $fileNameToStore;
        }
        if (!empty(request()->input('birthday'))) {
            $user->birthday = $request->input('birthday');
        }
        if (!empty(request()->input('language'))) {
            $user->language = $request->input('language');
        }
        $user->save();

        return back();

    }

    public function image() {
        return view('my.image');
    }

    public function process_image(Request $request){


        $this->validate($request, [
            'profile_image' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('profile_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

     

        $profile = User::find(Auth::user()->id);
        $profile->profile_image = $fileNameToStore;
        $profile->save();

        return redirect('my/account');
    }

    public function settings() {
    	return view('my.settings');
    }

    public function security() {
    	return view('my.security');
    }

    public function edit($id) {

    	$user = User::find($id);

    	if(Auth::user()->id !== $id){
    		return redirect('/my')->with('error', 'Accès non autorisé');
    	}
    	else{
    	return view('my.index');
    	}
    }

    public function brandnew(){
        return view('my.brandnew');
    }

    public function process_brandnew(Request $request){


        $this->validate($request, [
            'profile_image' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('profile_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

     

        $profile = User::find(Auth::user()->id);
        $profile->profile_image = $fileNameToStore;
        $profile->save();

        return redirect('/my/near');
    }

    public function near(){
        return view('my.near');
    }

    public function process_near(Request $request){

        $this->validate($request, [
            'mass_unit' => 'required|max:2',
            'height_unit' => 'required|max:2',
        ]);

        $user = User::find(Auth::user()->id);
        $user->mass_unit = $request->input('mass_unit');
        $user->height_unit = $request->input('height_unit');
        $user->save();

        return redirect('/my/laststep');
    }

    public function laststep(){
        if(Auth::user()->height_unit == 'm'){
            $unit = 'metres';
        }elseif(Auth::user()->height_unit == 'in'){
            $unit = 'pouces';
        }
        return view('my.laststep')->with('unit', $unit);
    }

    public function process_laststep(Request $request){
        $this->validate($request, [
            'height' => 'required|numeric',
        ]);

        $input = $request->input('height');

        if(Auth::user()->height_unit = 'm'){
            $height = $input;
        }elseif(Auth::user()->height_unit = 'in'){
            $height = $input * (1/39.3701);
        }

        $user = User::find(Auth::user()->id);
        $user->height = $height;
        $user->save();     
        
        return redirect('/my')->with('success', 'Bienvenue sur MyHealthApp');
    }


    
    public function done(){

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

        $recipe = Recipe::inRandomOrder()
                            ->take(1)
                            ->get();

        /*$test = Auth::user()->disease->pivot->disease_id;
        $twest = DiseaseRecipe::inRandomOrder()
                            ->where('disease_id', Auth::user()->disease_id)
                            ->take(1)
                            ->get();;*/

        $tip = Tip::inRandomOrder()->take(1)->get();
        return view('my.done', compact('recipe', 'biomass', 'tip'));
    }

}
