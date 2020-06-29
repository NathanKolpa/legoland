@extends('admin.layout')

@section('content')
    <div class="home">
        <h1>Admin orders</h1>

        <table  style="width:100%; text-align: center">
            <thead>
            <tr>
                <th>Id</th>
                <th>Totaal</th>
                <th>Klant</th>
                <th>Tickets</th>
                <th>Laatst geupdated</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <form method="POST" action="/admin/orders/{{ $order->id  }}">
                        @csrf()

                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->price }} Euro</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->tickets }} Tickets</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <button type="submit" name="_method" value="PUT">Wijzig</button>
                            <button type="submit" name="_method" value="DELETE">Verwijder</button>
                        </td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
