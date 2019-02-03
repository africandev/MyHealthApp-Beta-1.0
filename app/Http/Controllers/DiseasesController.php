<?php

namespace App\Http\Controllers;

use App\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiseasesController extends Controller
{
    
    public function index()
    {
        $diseases = Disease::all();
        return view('diseases.index')->with('diseases', $diseases);
    }

    
    public function create()
    {
        return view('diseases.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'information' => 'required',
            'additional' => 'required'
        ]);

        $disease = new Disease;
        $disease->user_id = auth()->user()->id;
        $disease->name = $request->input('name');
        $disease->title = $request->input('title');
        $disease->information = $request->input('information');
        $disease->additional = $request->input('additional');

    }

    
    public function show($id)
    {
        $disease = Disease::find($id);
        return view('diseases.show')->with('disease', $disease);
    }

    
    public function edit($id)
    {
        $disease = Disease::find($id);
        return view('diseases.edit')->with('disease', $disease);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'information' => 'required',
            'additional' => 'required'
        ]);

        $disease = Disease::find($id);
        $disease->user_id = auth()->user()->id;
        $disease->name = $request->input('name');
        $disease->title = $request->input('title');
        $disease->information = $request->input('information');
        $disease->additional = $request->input('additional');
    }

    
    public function destroy($id)
    {
        $disease = Disease::find(id);
        $disease->delete();
        return view('diseases')->with('success', 'Deleted');
    }
}
