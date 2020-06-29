<?php
namespace App\Http\Controllers;


use App\Order;
use App\User;

class AdminOrdersController extends Controller
{
    public function manageOrderPage()
    {
        if(!auth()->check() || !auth()->user()->is_admin)
            return redirect('');

        $orders = Order::with(['ticketOrders.ticket', 'user'])
            ->where('is_finished', true)
            ->get();

        foreach ($orders as $order)
        {
            $price = 0;
            $tickets = 0;

            foreach ($order->ticketOrders as $ticketOrder)
            {
                $tickets += $ticketOrder->ticket_count;
                $price += $ticketOrder->ticket->price * $ticketOrder->ticket_count;
            }

            $order->tickets = $tickets;
            $order->price = $price;
        }


        return view('admin.orders', [
            'orders' => $orders
        ]);
    }
}
