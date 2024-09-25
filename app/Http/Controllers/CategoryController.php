<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{

    public function showProducts($category_id)
    {
        $category = Category::with('products')->where('category_id', $category_id)->first();
    
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
    
        return view('admin.products.index', compact('category'));
    }
    


    public function view() {
        $categories = Category::get(); 
        return view('admin.categories.view', compact('categories')); 
    }
  
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required|max:255|string',
            'name'=>'required|max:255|string',
            'description'=>'required|max:255|string'
        ]);
        Category::create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'description'=>$request->description,
            
        ]);
        return redirect('categories/create')->with('status','Category Created');
    }

    public function destroy($category_id)
    {
        $category = Category::findOrFail($category_id); 
        $category->delete(); 
    
        return redirect('categories')->with('status', 'Category deleted successfully');
    }


    public function edit($category_id)
    {
        $category = Category::findOrFail($category_id); 
        return view('admin.categories.edit', compact('category')); 
    }

    public function update(Request $request, $category_id)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);


    $category = Category::findOrFail($category_id);

    // Update the category with the new data
    $category->name = $request->input('name');
    $category->description = $request->input('description');
    

    $category->save();

    
    return redirect('categories')->with('status', 'Category updated successfully');
}

    
}