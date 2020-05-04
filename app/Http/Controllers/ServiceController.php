<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function index($alias, Request $request){
        $service = Service::where('alias', $alias)->first();
        if($service){
        	return view('service.index',compact('service'));
        }else{
        	return view('error.404');
        }
    }
}
