@extends('layouts.app')
    @section('title')
        product categories
    @endsection
    @section('content')
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>COLECTIONS</th>
                <th><button data-toggle="modal" data-target="#addCategory" class="btn btn-primary"><b>+</b></button></th>
            </tr>
            @include('category.create')
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{count($category->collections)}}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$category->id}}">Edit</button>
                        <a href="{{route('category.delete',[$category->id])}}" onclick="return confirm('Are you sure, you want to delete this customer?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('category.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
