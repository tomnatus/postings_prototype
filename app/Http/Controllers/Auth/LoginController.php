<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //krijg je allleen te zien als je nog niet bent ingelogd
    public function __construct() {
        $this->middleware(['guest']);
    }
    public function index(){
        
        return view('auth.login');
    }

    public function store(Request $request) {
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // sign user in
         if (!auth()->attempt($request->only('email','password'))) {
             return back()->with('status','Foute Logingevens');
         }

        //redirect naar overzicht
        return redirect()->route('overzicht');
        
    }
}
