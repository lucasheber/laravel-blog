<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{

    public function index()
    {
        $helloWorld = "Hello World";
        var_dump(compact('helloWorld'));
        return view('hello_world.index', compact('helloWorld'));
    }
}
