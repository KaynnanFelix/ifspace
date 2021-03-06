<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Reservations;
use App\Spaces;
use App\Http\Controllers\SpacesController;
class ReservationsController extends Controller
{

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
        $reservations = Reservations::all();
        return view('reservations.index', compact(['reservations']));
    }

    public function indexAPI()
    {
        $reservations = Reservations::all();
        return $reservations->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spaces = Spaces::all();
        return view('reservations.create',compact(['spaces']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value2 = $request->input('space');
        $value1 = $request->input('period');
        $value = $value1.$value2;
        $reservations = new Reservations();
        $reservations->period = $value;
        $reservations->space = $request->input('space');
        $reservations->name = $request->input('name');
        $reservations->save();
        return redirect('reservations/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
