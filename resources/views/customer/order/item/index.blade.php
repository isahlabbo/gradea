@extends('layouts.app')
    @section('title')
        product categories
    @endsection
    @section('content')
    <h4 class="text text-center">ORDERED PRODUCTS</h4>
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>PICTURE</th>
                <th>NAME</th>
                <th>QUANTITY</th>
                <th>EACH PRICE</th>
                <th>TOTAL PRICE</th>
                <th>
                @if(!$order->paymentMethod)
                <button data-toggle="modal" data-target="#addPaymentMethod" class="btn btn-primary"><b>How do you want pay this order</b></button>
                @include('customer.order.item.payment')
                @endif
                </th>
            </tr>
           
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{$item->product->picture()}}" alt="" width="100" height="100"></td>
                    <td>{{$item->product->title}}</td>
                    <td>{{$item->quantity}}</td>  
                    <td>{{$item->eachPrice()}}</td>
                    <td>{{$item->totalPrice()}}</td>
                    <td> 
                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$item->id}}">Edit</button>
                    @include('customer.order.item.edit')
                    <button class="btn btn-danger">Remove</button>
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td> <b>Total</b> </td>
                    <td></td>
                    <td></td>
                    <td></td>  
                    <td></td>
                    <td></td>
                    <td><b>#{{$order->amount}}</b></td>
                </tr>
        </tbody>
    </table>
    @endsection
