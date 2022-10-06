<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileUpload;
use App\Models\Collection;
use App\Models\Category;

class ProductController extends Controller
{
    use FileUpload;

    public function register(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
            'quantity'=>'required',
        ]);
        $collection = Collection::find($request->collection);
        $product = $collection->products()->firstOrCreate([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
        ]);

        $this->storeFile($product,'image',$request->image,$collection->category->name.'/'.$collection->name.'/');
        return redirect()->route('product.index',[$collection->category->id])->withSuccess('Product registered');
    }

    public function index($categoryId)
    {
        return view('category.collection.product.index',['category'=>Category::find($categoryId)]);
    }

    public function search(Request $request)
    {
        $categories = [];
        foreach ($request->all() as $key => $value) {
            $category = Category::find($key);
            if($category){
                $categories[] = $category;
            }
        }
        if(count($categories)>0){
           return view('category.collection.product.result',['categories'=>$categories]);
        }
        return redirect()->route('dashboard')->withWarning('product found');
    }
}
