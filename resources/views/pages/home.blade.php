@extends('master_layout')
@section('content')
    @if(Session::get('cart'))
        {{dd(Session::get('cart'))}}
    @endif
@endsection