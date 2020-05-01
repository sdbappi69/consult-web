<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $service = Service::take(4)->get();
        return view('home.index',compact('service'));
    }
}
