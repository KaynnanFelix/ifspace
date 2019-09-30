<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservations;
use App\Http\Controllers\ReservationsController;

class AdminController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {
        $reservations = Reservations::all();
        return view('admin',compact(['reservations']));
    }
}
