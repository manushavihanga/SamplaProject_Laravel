<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

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
    
}