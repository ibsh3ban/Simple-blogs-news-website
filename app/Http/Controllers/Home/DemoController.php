<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{

    public function HomeIndex(){

        return view('frontend.index');


    } // End Method
}
