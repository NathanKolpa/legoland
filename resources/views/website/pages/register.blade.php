@extends('website.layout')

@section('content')

    <form method="POST">
        @csrf()
        <label>
            <input type="text" placeholder="name">
        </label>
        <label>
            <input type="email" placeholder="email">
        </label>
        <label>
            <input type="password" placeholder="password">
        </label>
    </form>

@endsection
