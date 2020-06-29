<?php
namespace App\Http\Controllers;


use App\Order;
use App\Ticket;
use App\TicketOrder;
use App\User;
use Illuminate\Support\Facades\DB;

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

    public function updateOrderItem(Order $order, Ticket $ticket)
    {
        if(!auth()->check() || !auth()->user()->is_admin)
            return redirect('');

        $this->validate(request(), [
            'ticket_count' => 'required|integer',
        ]);

        /**
         * How I can put composite keys in models in Laravel 5?
         *
         * You can't. Eloquent doesn't support composite primary keys.
         * Here's a Github issue regarding this.
         * https://github.com/laravel/framework/issues/5355
         */

        DB::table('tickets_orders')->where('order_id', $order->id)
            ->where('ticket_id', $ticket->id)
            ->update(['ticket_count' => request('ticket_count')]);


        return redirect('/admin/orders');
    }

    public function deleteOrderItem(Order $order, Ticket $ticket)
    {
        if(!auth()->check() || !auth()->user()->is_admin)
            return redirect('');

        DB::table('tickets_orders')->where('order_id', $order->id)
            ->where('ticket_id', $ticket->id)
            ->delete();

        return redirect('/admin/orders');
    }



    public function deleteOrder(Order $order)
    {
        if(!auth()->check() || !auth()->user()->is_admin)
            return redirect('');

        $order->ticketOrders()->delete();
        $order->delete();

        return redirect('/admin/orders');
    }
}
