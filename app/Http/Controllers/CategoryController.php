<?php

namespace App\Http\Controllers;

use App\Slot;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Category;

class CategoryController extends Controller
{
    public function index($alias, Request $request){
        $req = $request->all();
        $category = Category::where('alias', $alias)->first();
        $slot = Slot::with('getAppointmentSlot')->whereBetween('date',[Carbon::now()->toDateString(),Carbon::now()->addDay(6)->toDateString()]);
        ( $request->date ? $slot->where('date',date('Y-m-d',strtotime($request->date))) : null );
        $slot = $slot->paginate(2);
        if($category){
            return view('category.index',compact('category','alias','slot','req'));
        }else{
            return view('error.404');
        }
    }
}
