<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index',['categories'=>Category::all()]);
    }

    public function register(Request $data)
    {
        
        $data->validate([
            'name'=>'required|string',
        ]);
        Category::create([
            'name'=>$data->name,
            ]); 
        return redirect()->route('category.index')->withSuccess('Category Created');       
    }

    public function update(Request $data, $categoryId)
    {
        $data->validate([
            'name'=>'required|string',
            ]);
        $category = Category::find($categoryId);
        $category->update([
            'name'=>$data->name,
            ]);
           
        return redirect()->route('category.index')->withSuccess('Category Updated');  
    }

    public function delete($categoryId)
    {
        Category::find($categoryId)->delete();
        return redirect()->route('category.index')->withSuccess('Category Deleted');
    }
}
