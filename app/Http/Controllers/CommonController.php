<?php

namespace App\Http\Controllers;

use App\Slot;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function categorySlot(Request $request){
        $slot = Slot::with('getProvider','category')->where('date',date('Y-m-d',strtotime($request->date)))->get();
        dd($slot);
    }
}
