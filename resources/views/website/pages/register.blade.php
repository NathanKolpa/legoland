@extends('website.layout')

@section('content')

    <form method="POST" action="{{ url('users') }}">
        @csrf()
        <label>
            <input type="text" placeholder="name" name="name">
        </label>
        <label>
            <input type="email" placeholder="email" name="email">
        </label>
        <label>
            <input type="password" placeholder="password" name="password">
        </label>

        <button type="submit">Submit</button>
    </form>

@endsection
