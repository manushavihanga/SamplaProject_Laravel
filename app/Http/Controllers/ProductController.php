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
        return redirect('products/create')->with('status','products Created');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id); 
        $product ->delete(); 
    
        return redirect('products')->with('status', 'product deleted successfully');
    }


    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }
    

    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric', // Ensure price is numeric
            'description' => 'nullable|string',
        ]);
    
        // Find the product by ID
        $product = Product::findOrFail($id); // Change Category to Product
    
        // Update product fields
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
    
        // Save the updated product
        $product->save();
    
        // Redirect back to the products list with a success message
        return redirect('products')->with('status', 'Product updated successfully');
    }
    
  
   
}