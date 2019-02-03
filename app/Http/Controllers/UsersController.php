<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Disease;
use Form;
use DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = Recipe::all();
        //return Recipe::where('title', 'Recipe Two')->get();
        //$users = DB::select('SELECT * FROM users');
        //$users = Recipe::orderBy('title','desc')->take(1)->get();
        //$users = Recipe::orderBy('title','desc')->get();
        return redirect('/my');
        /*$users = User::orderBy('created_at','asc')->paginate(10);
        return view('users.index')->with('users', $users);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diseases = Disease::all();
        return view('users.create')->with('diseases', $diseases);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'disease_id' => 'required',
            'title' => 'required',
            'headline' => 'required',
            'body' => 'required',
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
            $patha = $request->file('cover_image')->storeAs('public/content/users/cover_image', $fileNameToStorea);
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
            $pathb = $request->file('small_image')->storeAs('public/content/users/small_image', $fileNameToStoreb);
        } else {
            $fileNameToStoreb = 'nosmallimage.jpg';
        }


        // Create Recipe
        $recipe = new Recipe;
        $recipe->disease_id = $request->input('disease_id');
        $recipe->title = $request->input('title');
        $recipe->user_id = auth()->user()->id;
        $recipe->headline = $request->input('headline');
        $recipe->body = $request->input('body');
        $recipe->cover_image = $fileNameToStorea;
        $recipe->small_image = $fileNameToStoreb;
        $recipe->save();

        return redirect('/users')->with('success', 'Added Succesfully to the DB.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        // Check for correct user
        if(auth()->user()->id !==$user->user_id){
            return redirect('/users')->with('error', 'Unauthorized Page');
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Handle File Upload
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
            $path = $request->file('profile_image')->storeAs('public/content/', $fileNameToStore);
        }

        // Create Recipe
        $recipe = Recipe::find($id);
        $recipe->title = $request->input('title');
        $recipe->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $recipe->cover_image = $fileNameToStore;
        }
        $recipe->save();

        return redirect('/users')->with('success', 'Recipe Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);

        // Check for correct user
        if(auth()->user()->id !==$recipe->user_id){
            return redirect('/users')->with('error', 'Unauthorized Page');
        }

        if($recipe->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$recipe->cover_image);
        }

        $recipe->delete();
        return redirect('/users')->with('success', 'Recipe Removed');
    }
}
