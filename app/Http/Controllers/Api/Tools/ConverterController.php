<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConverterController extends Controller
{
    public function converter(Request $request){

      $this->validate($request, [
        'mass' => 'numeric|required',
        'mass_unit' => 'max:2|required',
        'height' => 'numeric|required',
        'height_unit' => 'max:2|required',
      ]);

      $mass = $request['mass'];
      $mass_unit = $request['mass_unit'];
      $height = $request['height'];
      $height = $request['height_unit'];

      if($mass_unit == 'kg'){
        $mass_result = $mass;
      }elseif($mass_unit == 'lb'){
        $mass_result = $mass * 2.20462;
      }


      return response()->json(['data' => $bmi], 200, [], JSON_NUMERIC_CHECK);
    }
}
