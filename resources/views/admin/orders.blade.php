@extends('admin.layout')

@section('content')
    <div class="home">
        <h1>Admin orders</h1>

        <table style="width:100%; text-align: center">
            <thead>
            <tr>
                <th>Id</th>
                <th>Totaal</th>
                <th>Klant</th>
                <th>Tickets</th>
                <th>Laatst geupdated</th>
                <th></th>
                <th>Tickets</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr style="background: lightgrey">
                    <form method="POST" action="/admin/orders/{{ $order->id  }}">
                        @csrf()

                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->price }} Euro</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->tickets }} Tickets</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <button type="submit" name="_method" value="DELETE">Verwijder</button>
                        </td>
                    </form>
                    <td>
                        @foreach($order->ticketOrders as $ticketOrder)

                            <div>
                                <form method="POST"
                                      action="/admin/orders/{{ $order->id }}/items/{{ $ticketOrder->ticket->id }}">
                                    @csrf()
                                    <span>{{ $ticketOrder->ticket->name  }}</span>
                                    <input name="ticket_count" value="{{ $ticketOrder->ticket_count }}">
                                    <button type="submit" name="_method" value="PUT">Wijzig</button>
                                    <button type="submit" name="_method" value="DELETE">Verwijder</button>
                                </form>
                                <br>
                            </div>
                        @endforeach

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
