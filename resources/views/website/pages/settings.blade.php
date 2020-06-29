@extends('website.layout')

@section('content')

    <form method="POST" action="{{ url('self') }}">
        @csrf()
        @method('PUT')
        <label>
            Subscribe to newsletter
            <input type="checkbox" name="wants_newsletter" {{ $wants_newsletter ? 'checked=checked' : '' }}>
        </label>

        <button type="submit">Update</button>
    </form>

@endsection
