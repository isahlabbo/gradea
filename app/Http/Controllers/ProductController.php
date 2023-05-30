<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileUpload;
use App\Models\Collection;
use App\Models\Category;
use App\Models\Product;

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
        return redirect()->route('category.collection.product.index',[$collection->category->id, $collection->id])->withSuccess('Product registered');
    }

    public function update(Request $request, $categoryId, $productId)
    {
        
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            
            'quantity'=>'required',
        ]);
        $product = Product::find($productId);
        $product->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
        ]);
        if($request->image){
            $this->updateFile($product,'image',$request->image,$collection->category->name.'/'.$collection->name.'/');
        }
        return redirect()->route('category.collection.product.index',[$product->collection->category->id, $product->collection->id])->withSuccess('Product Updated');
    }

    public function delete($categoryId, $productId)
    {
        
        $product = Product::find($productId);
        if(count($product->orderItems)> 0){
            return redirect()->route('category.collection.product.index',[$product->collection->category->id, $product->collection->id])->withWarning('sorry we cant delete this product, because there are may orders record on it ');
        }else{
            $product->delete();
            $this->deleteFile($product,'image');
        }
        
        return redirect()->route('category.collection.product.index',[$product->collection->category->id, $product->collection->id])->withSuccess('Product Deleted');
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
