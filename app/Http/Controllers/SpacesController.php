<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Spaces;
class SpacesController extends Controller
{

       // $this->middleware('auth:admin', );
  
    public function __construct() {
        $this->middleware('auth:admin')->except('indexAPI');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaces = Spaces::all();
        return view('spaces.index', compact(['spaces']));
    }

    public function indexAPI()
    {
        $spaces = Spaces::all();
        return $spaces->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('spaces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $space = new Spaces();
        $space->name = $request->input('name');
        $space->number = $request->input('number');
        $space->description = $request->input('description');
        $space->localization = $request->input('localization');
        $path = $request->file('photo')->store('images','public');
        $space->photo = $path;
        $space->type = $request->input('type');
        $space->size = $request->input('size');
        $space->save();
        return redirect('spaces/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $space= Spaces::find($id);
        if(isset($space)){
            return view('spaces.show',compact('space'));
        }
        return view('spaces/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $space = Spaces::find($id);
        if(isset($space)){
            return view('spaces.edit',compact('space'));
        }
        return redirect('spaces/');
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
        $space = Spaces::find($id);
        if(isset($space)){
            $space->name = $request->input('name');
            $space->number = $request->input('number');
            $space->description = $request->input('description');
            $space->save();
        }
        
        
        return redirect('spaces/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $space = Spaces::find($id);
        if(isset($space)){
            $photo = $space->photo;
            Storage::disk('public')->delete($photo);
            $space->delete();
        }
        return redirect('spaces/');
    }
}
