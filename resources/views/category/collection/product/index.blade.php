@extends('layouts.app')
    @section('title')
        product categories
    @endsection
    @section('content')
    @foreach($category->collections as $collection)
        <h4 class="text text-center mt-4">{{strtoupper($collection->name)}} COLLECTION <button class="btn btn-dark" data-toggle="modal" data-target="#newProduct">New {{strtoupper($category->name)}}</button>
                    @include('category.collection.product.create')</h4>
        <div class="row">
        @foreach($collection->products as $product)
           <div class="col-md-4">
                <div class="card-body shadow">
                    <div class="text-center"><img  src="{{$product->picture()}}" alt="#" width="200" height="140"/></div>
                    <div class="description">
                        <h5 >Title: {{$product->title}}</h5>
                        <h5 >Quantity: {{$product->quantity}}</h5>
                        <h5 ><span>Price: <del>#{{$product->price}}</del></span> <span>#{{$product->price}}</span></h5>
                        <h5><button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$product->id}}">Edit</button></h5>
                        
                        @include('category.collection.product.edit')
                        <a href="{{route('category.collection.product.delete',[$category->id, $product->id])}}">
                            <h5><button class="btn btn-danger">Delete</button></h5>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @endforeach
    @endsection
