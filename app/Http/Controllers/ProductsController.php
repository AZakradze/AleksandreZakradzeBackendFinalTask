<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function findex() {
        $products = Product::with('subcatecory')->get();

        return view('welcome', compact('products'));
    }

    public function edit(Product $product) {
        $product = Product::with('subcatecory')->where('id', $product->id)->first();
        $categories = Category::with('subcategories')->get();
        return view('edit', compact(['product', 'categories']));
    }

    public function store(Request $request) {
        $data = $request->except(['_token']);
        $data['img'] = Storage::putFile('public/imgs', $request->file('img'));
        $data['category_id'] = 1;
        Product::create($data);
        return redirect()->back();
    }

    public function update(Request $request, Product $product) {
        $data = $request->except(['_token']);
        if ($request->file('img')) {
            $data['img'] = Storage::putFile('public/imgs', $request->file('img'));
        }
        $data['category_id'] = 1;
        $product->update($data);
        return redirect()->back();
    }



    public function destroy(Product $product) {
        $product->destroy($product->id);
        return redirect()->back();
    }
}
