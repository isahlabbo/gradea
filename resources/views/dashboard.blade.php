@extends('layouts.app')

@section('title')
 Dashbaord
@endsection

@section('content')
@if(Auth::user()->role == 'Admin')
    <table class="table">
        <thead>
            <th>S/N</th>
            <th>NAME</th>
            <th>PHONE</th>
            <th>ADDRESS</th>
            <th>AMOUNT (#)</th>
            <th>PAYMENT METHOD</th>
            <th>DELIVERY METHOD</th>
            <th>DATE</th>
        </thead>
        <tbody>
        @foreach(App\Models\Order::all() as $order)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$order->customer->user->name}}</td>
                <td>{{$order->customer->phone}}</td>
                <td>{{$order->customer->address}}</td>
                <td>{{$order->amount}}</td>
                <td>{{$order->paymentMethod->name ?? ''}}</td>
                <td>{{$order->delivery->name ?? ''}}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@elseif(Auth::user()->role == 'customer')
    <div class="row">
        @if(Auth::user()->customer)
            @foreach(Auth::user()->customer->orders as $order)
                <div class="col-md-12">
                    <div class="card-body shadow m-2">
                        <h3>Order Notice</h3>
                        <p>We are pleased to notify you that, we have seen your order of <b># {{$order->amount}}</b> naira products at <b>{{$order->created_at}}</b> but, the delivery and payment methods were not update please click the button bellow to do that. Additionally you can update this order to add more or remove items from it or you can make another oreder. Best regard</p>
                        <p><a href="{{route('customer.order.item.index',[Auth::user()->customer->id,$order->id])}}">Modify the order</a></p>
                        <p><a href="">Add Payment and Delivery Methods</a></p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <p style="color:black; line-height: 2;">Hi <b>{{Auth::user()->name}}</b>, welcome to <b>{{config('app.name')}}</b> 
    the house of the bast quality product, 
    we can help you search for the available product from our general store</p>
    <form action="{{route('product.search')}}" method="post">
       @csrf
        <div class="row input-group">
            @foreach(App\Models\Category::all() as $category)
                <div class="col-md-6">
                    <span>{{$category->name}}</span> <span>
                    <input type="checkbox" name="{{$category->id}}"></span>
                    <hr>
                </div>
            @endforeach
        </div>
        <button class="btn btn-dark">Search</button>
    </form>
    
    </div>
    </div>
@elseif(Auth::user()->role == 'staff')
    <h3 class="text text-center">PRODUCT CATEGORIES</h3>
    <div class="row">
        @foreach(App\Models\Category::all() as $category)
        <div class="col-md-3">
            <div class="card-body shadow m-2">
                <h4>{{$category->name}}</h4>
                <h4>{{count($category->collections)}} Collections</h4>
                <a href="{{route('product.index',[$category->id])}}"><h4>{{$category->products()}} Product</h4></a>
                @if(count($category->collections)>0)
                    <button class="btn btn-dark" data-toggle="modal" data-target="#newProduct">New Product</button>
                    @include('category.collection.product.create')
                @endif
            </div>
        </div>
        @endforeach
    </div>
@endif

@endsection