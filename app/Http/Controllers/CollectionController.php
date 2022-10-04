<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Collection;

class CollectionController extends Controller
{
    public function index($categoryId)
    {
        return view('category.collection.index',['category'=>Category::find($categoryId)]);
    }

    public function register(Request $data, $categoryId)
    {
        
        $data->validate([
            'name'=>'required|string',
        ]);
        $category = Category::find($categoryId);
        $category->collections()->firstOrCreate([
            'name'=>$data->name,
            ]); 
        return redirect()->route('category.collection.index',$categoryId)->withSuccess('Collection Created');       
    }

    public function update(Request $data, $categoryId, $collectionId)
    {
        $data->validate([
            'name'=>'required|string',
            ]);
        $collection = Collection::find($collectionId);
        $collection->update([
            'name'=>$data->name,
            ]);
           
        return redirect()->route('category.collection.index',$categoryId)->withSuccess('Collection Updated');  
    }

    public function delete($categoryId,$collectionId)
    {
        Collection::find($collectionId)->delete();
        return redirect()->route('category.collection.index',[$categoryId])->withSuccess('Collection Deleted');
    }
}
