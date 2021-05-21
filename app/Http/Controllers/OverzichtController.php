<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverzichtController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        //debugging 
        // dd(auth()->user());
        return view('overzicht');
    }
}
