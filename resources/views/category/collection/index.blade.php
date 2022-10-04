@extends('layouts.app')
    @section('title')
        {{strtolower($category->name)}} collections
    @endsection
    @section('content')
    <h4 class="text text-center">{{strtoupper($category->name)}} COLLECTIONS</h4>
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>PRODUCTS</th>
                <th><button data-toggle="modal" data-target="#addCategory" class="btn btn-primary"><b>+</b></button></th>
            </tr>
            @include('category.collection.create')
        </thead>
        <tbody>
            @foreach($category->collections as $collection)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$collection->name}}</td>
                    <td><a href="{{route('category.collection.index',[$collection->category->id, $collection->id])}}" class="btn btn-dark">{{count($collection->products)}}</a></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$category->id}}">Edit</button>
                        <a href="{{route('category.collection.delete',[$collection->category->id, $category->id])}}" onclick="return confirm('Are you sure, you want to delete this customer?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('category.collection.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
