<?php

namespace App\Http\Controllers\Modules;

use App\Diet;
use App\User;
use App\Recipe;
use App\BioMass;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BioMassController extends Controller
{

    public function __construct ()
    {
        $this->middleware('auth');
        $this->middleware('web');
    }


    public function index()
    {
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
            $diet = Diet::where('biomass', '1')->inRandomOrder()->get(1);
        }
        else {
            $diet = Diet::where('biomass', '2')->inRandomOrder()->get(1);
        }

        return view('biomass.index')->with(compact('biomasses', 'diet'));
        }
    }


    public function create()
    {
        $date = Auth::user()->language;
        Date::setLocale($date);
        $mytime = Date::now()->format('l j F Y');
        $mytime = ucfirst($mytime);
        return view('biomass.create')->with('mytime', $mytime);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'mass' => 'numeric|required',
        ]);

        if(Auth::user()->mass_unit == 'kg'){
            $mass = $request->input('mass');
        }
        else{
            $mass = $request->input('mass') * (1/2.20462);
        }

        if(Auth::user()->height_unit == 'm'){
            $height = Auth::user()->height;
        }
        else{
            $height = Auth::user()->height * (1/39.3701);
        }

        $biomass = new BioMass;
        $biomass->user_id = Auth::user()->id;
        $biomass->mass = $mass;
        $biomass->mass_unit = Auth::user()->mass_unit;
        $biomass->height = $height;
        $biomass->height_unit = Auth::user()->height_unit;
        $biomass->user()->attach($request->users);
        $biomass->save();
        return redirect('/biomass');
    }

    public function show($id)
    {

        $row = BioMass::find($id);

        //Check user's mass unit and converts it if necessary
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
          $color = 'danger';
          $selector = '3';
          $message = 'Vous êtes en d\'état dobésité';
          $background = '3';
          $result_icon = '<i class="fas fa-angle-up"></i>';
        }
        elseif ($result < 18.5) {
          $color = 'warning';
          $selector = '1';
          $message = 'Vous êtes sous le poids';
          $background = '1';
          $result_icon = '<i class="fas fa-angle-down"></i>';
        }
        else {
          $color = 'success';
          $selector = '2';
          $message = 'Très bien !!!';
          $background = '2';
          $result_icon = '<i class="far fa-check-circle"></i>';
        }

        $recipes = Recipe::where('biomass', $selector)->take(4)->inRandomOrder();

        //returns everything to the view
        if($row->user_id == Auth::user()->id){
            return view('biomass.show')
            ->with(compact('row', 'mass', 'height', 'result', 'color', 'message', 'selector', 'background', 'result_icon'));
        }else{
            return redirect('/biomass');
        }
    }


    public function edit($id)
    {
        $biomass = BioMass::find($id);
        //Check if correct user

        if(Auth::user()->id !== $biomass->user_id){
            return redirect('/biomass')->with('error', 'Unauthorized Access');
        }

        return view('biomass.edit')->with('biomass', $biomass);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'mass' => 'numeric|required',
            'mass_unit' => 'required',
            'height' => 'numeric|required',
            'height_unit' => 'required'
        ]);

        $biomass = BioMass::find($id);
        $biomass->user_id = Auth::user()->id;
        $biomass->mass = $request->input('mass');
        $biomass->mass_unit = $request->input('mass_unit');
        $biomass->height = $request->input('height');
        $biomass->height_unit = $request->input('height_unit');
    }

    public function destroy($id)
    {
        $biomass = BioMass::find($id);

        if(Auth::user()->id !== $biomass->user_id){
            return redirect('/biomass')->with('error', 'Unauthorized Access');
        }

        $biomass->delete();
        return redirect('/biomass')->with('success', 'Has been successfully deleted.');
    }

    public function evchart() {
        $biomasses = BioMass::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return response()->json($biomasses);
    }
}
