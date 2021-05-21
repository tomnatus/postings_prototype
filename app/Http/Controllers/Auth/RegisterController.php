<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //mogen enkel getoond worden als je nog niet bent ingelogd
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

       $this->validate($request , [
           'name' => 'required|max:50',
           'username' => 'required|max:50',
           'email' => 'required|email',
           'password' => 'required|confirmed'

       ]);
        // store the user
       User::create([
           'name'=> $request->name ,
           'username' => $request->username ,
           'email' => $request-> email ,
           'password' => Hash::make($request->password),
           ]);

       // sign user in
        auth()->attempt($request->only('email','password'));

        // redirect

        return redirect()->route('overzicht');

    }

}
