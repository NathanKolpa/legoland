@extends('website.layout')

@section('content')
    <form method="POST" action="{{ url('cart/items') }}">
        @csrf()

        <h1>Your cart</h1>
        <ul>
            @foreach($items as $item)
                <li>
                    {{$item->ticket->name}} x {{ $item->ticket_count }}
                </li>
            @endforeach
        </ul>

        <p>Totaal: {{ $price  }}</p>

        <select name="item">
            @foreach($tickes as $ticket)
                <option value="{{ $ticket->id }}">{{ $ticket->name  }} - {{ $ticket->price }} Euro</option>
            @endforeach
        </select>

        <label>
            <input type="number" placeholder="amout of tickets" name="ticket_count" value="1">
        </label>

        <button type="submit">Add to cart</button>
    </form>

    <form method="POST" action="{{ url('cart/items') }}">
        @csrf()
        @method('DELETE')
        <button type="submit">Clear cart</button>
    </form>

    @if(count($items) > 0)
        <form method="POST" action="{{ url('orders') }}">
            @csrf()
            <button type="submit">Order</button>
        </form>
    @endif

@endsection
