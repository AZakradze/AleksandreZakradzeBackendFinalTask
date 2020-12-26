<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    public function store(Request $request){
        Subcategory::create($request->except('_token'));
        return redirect()->back();
    }
}
