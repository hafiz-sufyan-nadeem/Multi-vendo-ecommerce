<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        if(auth()->user()->role == 'vendor'){
            $products = Product::where('vendor_id', auth()->id())->with('category')->get();
        } else {
            $products = Product::with('category')->get();
        }
        return view('products.index', compact('products'));
    }

    public function create()
    {
        if(auth()->user()->role !== 'vendor'){
            abort(403);
        }
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if(auth()->user()->role !== 'vendor'){
            abort(403);
        }
        $validated = $request->validate([
            'name'        => 'required',
            'price'       => 'required',
            'stock'       => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'sale'        => 'nullable',
            'image'       => 'nullable',
        ]);
        if($request->hasFile('image')){
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $validated['vendor_id'] = auth()->id();
        Product::create($validated);
        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        if(
            auth()->user()->role == 'vendor'
            && $product->vendor_id != auth()->id()
        ){
            abort(403);
        }
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if(auth()->user()->role == 'vendor' && $product->vendor_id != auth()->id() || auth()->user()->role == 'admin'){
            abort(403);
        }
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'nullable|max:2048',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $product->update($validated);
        return redirect('/products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(auth()->user()->role == 'vendor' && $product->vendor_id != auth()->id()){
            abort(403);
        }
        $product->delete();
        return redirect('/products');
    }
}
