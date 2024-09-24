<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function view()
    {   
        $products = Product::get();
        return view('admin.products.view',compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required'
            ]);
            
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->route('products/create')->with('success', 'Product created successfully.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id); 
        $product ->delete(); 
    
        return redirect('products')->with('status', 'product deleted successfully');
    }

  
  
   
}