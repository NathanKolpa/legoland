@extends('skeleton')


@section('styling')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop

@include('admin.header')

<div class="admin">

    <div class="adminContent">
        @yield('content')
    </div>
</div>
