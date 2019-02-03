<?php

namespace App\Http\Controllers\Modules;

use Form;
use App\Diet;
use App\Step;
use App\User;
use App\Disease;
use App\StepsUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class DietController extends Controller
{

    public function _construct(){
        $this->middleware('auth');
    }

    public function addsteptouser(){
        $step = StepsUser::find($_GET['step']);
        $step->completed = '1';
        $step->save();
        return back();
    }

    public function index(){
        $diets = Diet::all();
        return view('diet.index')->with(compact('diets'));
    }

    public function steps($id) {
        $user = Auth::user();
        $diet = Diet::find($id);
 
        //Get User Done Steps from Diet
        $stepall = StepsUser::where('diet_id', '=', $id)
                            ->where('user_id', '=', Auth::user()->id)
                            ->where('completed', '0')
                            ->orderBy('id', 'asc')
                            ->get();

        //Get none-done Steps from Diet
        $stepuser = StepsUser::where('diet_id', '=', $id)
                            ->where('user_id', '=', Auth::user()->id)
                            ->where('completed', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        return view('diet.steps')->with(compact('diet', 'stepall', 'stepuser'));
    }

    public function create(){
        $diseases = Disease::all();
        $diets = Diet::all();
        return view('diet.create')->with(compact('diseases', 'diets'));
    }

    public function insert(Request $request){
        
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'duration' => 'required',
            'paragraph' => 'required',
            'biomass' => 'integer|nullable', 
            'short' => 'required',
            'disease' => 'integer|nullable', 
            'image' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $patha = $request->file('image')->storeAs('public/diet/image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $diet = new Diet;
        $diet->name = $request->input('name');
        $diet->body = $request->input('body');
        $diet->duration = $request->input('duration');
        $diet->paragraph = $request->input('paragraph');
        $diet->biomass = $request->input('biomass');
        $diet->short = $request->input('short');
        $diet->disease = $request->input('disease');
        $diet->image = $fileNameToStore;
        $diet->save();

        return redirect('diet')->with('success', 'Diet Created Successfully');
    }

    public function show($id){
        $user = Auth::user();
        $diet = Diet::find($id);
 
        //Get User Done Steps from Diet
        $stepall = StepsUser::where('diet_id', '=', $id)
                            ->where('user_id', '=', Auth::user()->id)
                            ->where('completed', '0')
                            ->get();

        //Get none-done Steps from Diet
        $stepuser = StepsUser::where('diet_id', '=', $id)
                            ->where('user_id', '=', Auth::user()->id)
                            ->where('completed', '1')
                            ->get();

        $diet1 = $user->diets()->where('diet_id', '=', $id)->distinct()->get();
        if($diet1 == '[]'){
            return view('diet.show')->with(compact('diet', 'steps'));
        }else{
            return view('diet.inside')->with(compact('diet', 'stepall', 'stepuser'));
        }
        
    }

    public function info($id){
        $diet = Diet::find($id);
        return view('diet.info')->with(compact('diet'));
    }

    

    public function subscribe(){
        $step = Step::where('diet_id', $_POST['diet'])->get();
        $data = array();
        foreach($step as $row)
        {
            if(!empty($row))
            {

            $now = Carbon::now();

            $data[] =[
                        'name' => $row->name,
                        'user_id' => Auth::user()->id,
                        'diet_id' => $row->diet_id,
                        'completed' => '0',
                        'body' => $row->body,
                        'long' => $row->long,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];                 
    
        }}

        StepsUser::insert($data);

        $user = Auth::user();
        $user->diets()->attach($_POST['diet']);
        $user->save();

        return back();
    }

    public function addstep(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'nullable',
            'long' => 'required',
        ]);

        $step = new Step;
        $step->name = $request->input('name');
        $step->user_id = Auth::user()->id;
        $step->diet_id = $request->input('diet_id');
        $step->body = $request->input('body');
        $step->long = $request->input('long');
        $step->save();

        return back();
        //return redirect('diet/'.$request->input('diet_id'));
    }

    
}
