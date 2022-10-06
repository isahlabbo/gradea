@extends('layouts.app')
    @section('title')
        product categories
    @endsection
    @section('content')
    <form action="{{route('customer.order.register',[Auth::user()->id])}}" method="post">
        @csrf
        @foreach($categories as $category)
        <h3 class="text text-center">{{$category->name}}</h3>
            @foreach($category->collections as $collection)
                <div class="row">
                @foreach($collection->products as $product)
                <div class="col-md-2">
                        <div class="card-body shadow">
                            <div class="text-center mb-2"><img  src="{{$product->picture()}}" alt="#"/></div>
                            <div class="description">
                                <h4 >Title: {{$product->title}}</h4>
                                <h4 >Quantity: {{$product->quantity}}</h4>
                                <h4 ><span>Price: <del>#{{$product->price}}</del></span> <span>#{{$product->customerPrice(Auth::user()->customer)}}</span></h4>
                                <h4>Add to Cart <input type="checkbox" name="{{$product->id}}"></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            @endforeach
            <button class="btn btn-dark">Order Now</button>
        @endforeach
    </form>
    @endsection
