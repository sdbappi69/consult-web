<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index($alias, Request $request){
        $category = Category::where('alias', $alias)->first();
        if($category){
        	return view('category.index',compact('category'));
        }else{
        	return view('error.404');
        }
    }
}
