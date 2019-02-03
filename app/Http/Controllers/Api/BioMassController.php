<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BioMass;
use App\User;

class BioMassController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth:api');
    }
    public function front()
    {
        $bmi = BioMass::where('user_id', '=', Auth('api')->user()->id)->orderBy('created_at', 'desc')->take(10)->get();
        return response()->json(['data' => $bmi], 200, [], JSON_NUMERIC_CHECK);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'mass' => 'integer|required',
            'mass_unit' => 'required',
            'height' => 'integer|required',
            'height_unit' => 'required'
        ]);


        $bmi = BioMass::create([
            'user_id' => Auth::user()->id,
            'mass' => $request['mass'],
            'mass_unit' => $request['mass_unit'],
            'height' => $request['height'],
            'height_unit' => $request['height_unit'],
        ]);

        return response()->json(['data' => 'Success'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function show($id)
    {
        $bmi = BioMass::find($id);
        return response()->json(['data' => $bmi], 200, [], JSON_NUMERIC_CHECK);
    }

    public function edit(Request $request,$id)
    {
        $bmi = BioMass::find($id);
        //Check if correct user

        if(Auth()->user()->id !== $bmi->user_id){
            return response()->json(['data' => 'Forbidden'], 501, [], JSON_NUMERIC_CHECK);
        }

        $this->validate($request, [
            'mass' => 'integer|required',
            'mass_unit' => 'required',
            'height' => 'integer|required',
            'height_unit' => 'required'
        ]);

        $bmi = BioMass::find($id);
        $bmi->user_id = Auth::user()->id;
        $bmi->mass = $request->input('mass');
        $bmi->mass_unit = $request->input('mass_unit');
        $bmi->height = $request->input('height');
        $bmi->height_unit = $request->input('height_unit');


        return response()->json(['data' => 'Success'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function destroy($id)
    {
        $bmi = BioMass::find($id);
        $bmi->delete();

        /*if(Auth()->user()->id !== $bmi->user_id){
            return response()->json(['data' => 'Forbidden'], 501, [], JSON_NUMERIC_CHECK);
        }*/

        return response()->json(['data' => 'Success'], 200, [], JSON_NUMERIC_CHECK);
    }





}
