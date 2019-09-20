<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $authOk = Auth::guard('admin')->attempt($credentials, $request->remember);

        if($authOk){
            return redirect()->intended(route('admin.dashboard'));
        } 
        return redirect()->back()->withInput($request->only('email','remember'));

    }

    public function index(){
        return view('auth.admin-login');
    }
}
