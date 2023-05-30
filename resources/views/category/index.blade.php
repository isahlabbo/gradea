@extends('layouts.app')
    @section('title')
        product categories
    @endsection
    @section('content')
    <h4 class="text text-center">PRODUCT CATEGORIES <button data-toggle="modal" data-target="#addCategory" class="btn btn-primary"><b>+</b></button></h4>
    @include('category.create')
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card-body shadow mt-4">
                    <h3>{{$category->name}}</h3>
                    <table>
                        <tr>
                            <td>Collections</td>
                            <td><a href="{{route('category.collection.index',[$category->id])}}" class="btn btn-dark">{{count($category->collections)}}</a></td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$category->id}}">Edit</button>
                            </td>
                            <td>
                                <a href="{{route('category.delete',[$category->id])}}" onclick="return confirm('Are you sure, you want to delete this customer?')"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    </table>
                </div>    
                @include('category.edit')
            </div>  
            @endforeach
        </div>
    @endsection
