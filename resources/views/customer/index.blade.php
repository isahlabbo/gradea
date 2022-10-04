@extends('layouts.app')
    @section('title')
        customers
    @endsection
    @section('content')
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>GENDER</th>
                <th>ADDRESS</th>
                <th>PASSWORD</th>
                <th>EMAIL</th>
                <th><button data-toggle="modal" data-target="#addCustomer" class="btn btn-primary"><b>+</b></button></th>
            </tr>
            @include('customer.create')
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->gender}}</a></td>
                    <td>{{$customer->address}}</a></td>
                    <td>{{$customer->real_password}}</a></td>
                    <td>{{$customer->email}}</a></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$customer->id}}">Edit</button>
                        <a href="{{route('customer.delete',[$customer->id])}}" onclick="return confirm('Are you sure, you want to delete this customer?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('customer.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
