@extends('layouts.app')
    @section('title')
        product categories
    @endsection
    @section('content')
    @foreach($category->collections as $collection)
        <h4 class="text text-center">{{strtoupper($collection->name)}} COLLECTION <button class="btn btn-dark" data-toggle="modal" data-target="#newProduct">New {{strtoupper($category->name)}}</button>
                    @include('category.collection.product.create')</h4>
        <div class="row">
        @foreach($collection->products as $product)
           <div class="col-md-2">
                <div class="card-body shadow">
                    <div class="text-center mb-2"><img  src="{{$product->picture()}}" alt="#"/></div>
                    <div class="description">
                        <h4 >Title: {{$product->title}}</h4>
                        <h4 >Quantity: {{$product->quantity}}</h4>
                        <h4 ><span>Price: <del>#{{$product->price}}</del></span> <span>#{{$product->price}}</span></h4>
                        <h4><button class="btn btn-warning">Edit</button></h4>
                        <h4><button class="btn btn-danger">Delete</button></h4>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @endforeach
    @endsection
