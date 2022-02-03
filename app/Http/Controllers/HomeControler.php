<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControler extends Controller
{
    //
    public function index() {
        return view('welcome');
    }

    public function about() {
        return '<h1> About html page</h1>';
    }

    public function contact() {
        return '<h1> contact page</h1>';
    }
}
