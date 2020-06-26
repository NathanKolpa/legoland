@extends('skeleton')

@section('styling')
    <link href="{{ asset('css/website.css') }}" rel="stylesheet">
@stop

@include('website.header')

@section('root')
    <div class="content">
        @yield('content')
    </div>
@stop
