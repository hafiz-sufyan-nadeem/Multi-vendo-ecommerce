<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){

    }

    public function create(Request $request)
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'sale' => 'nullable',
            'image' => 'nullable',
            'category_id' => 'required'
        ]);

        $validated['vendor_id'] = auth()->id();

        Product::create($validated);

        return redirect('/products');
    }
}
