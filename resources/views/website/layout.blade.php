@extends('skeleton')

@include('website.header')

@section('root')
    <div class="content">
        @yield('content')
    </div>
@stop
