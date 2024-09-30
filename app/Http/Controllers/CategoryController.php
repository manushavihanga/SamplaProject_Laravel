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

    public function view() 
    {
        $categories = Category::all(); 
        return view('admin.categories.view', compact('categories')); 
    }
  
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'category' => 'required|string',
            'category_id' => 'required|string',
            'description' => 'nullable|string',
        ]);
    
        // Create a new category
        Category::create([
            'name' => $validated['category'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
        ]);
    
        // Redirect back with success message
        return redirect()->route('categories.view')->with('success', 'Category added successfully!');
    }
    

    public function destroy($category_id)
    {
        $category = Category::findOrFail($category_id); 
        
        // Optionally, check if products are associated with the category before deleting
        // $category->products()->delete(); // If you want to delete products too
        $category->delete(); 

        return redirect()->route('categories.view')->with('status', 'Category deleted successfully');
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

        return redirect()->route('categories.view')->with('status', 'Category updated successfully');
    }
}
