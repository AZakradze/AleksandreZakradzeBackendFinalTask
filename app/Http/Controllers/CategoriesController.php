<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function store(Request $request) {
        Category::create($request->except('_token'));
        return redirect()->back();
    }

    public function destroy(Category $category) {
        $category->destroy($category->id);
        return redirect()->back();
    }
}
