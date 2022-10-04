@extends('layouts.app')

@section('title')
 Dashbaord
@endsection

@section('content')
@if(Auth::user()->role == 'Admin')
{{Auth::user()->role}}
@elseif(Auth::user()->role == 'customer')
{{Auth::user()->role}}
@endif
@endsection