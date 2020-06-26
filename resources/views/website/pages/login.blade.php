@extends('website.layout')

@section('content')
    <form method="POST" action="{{ url('login') }}">
        @csrf()
        <label>
            <input type="email" placeholder="email" name="email">
        </label>
        <label>
            <input type="password" placeholder="password" name="password">
        </label>

        <button type="submit">Submit</button>
    </form>

@endsection
