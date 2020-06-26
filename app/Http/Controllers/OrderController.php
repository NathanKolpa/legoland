<?php

namespace App\Http\Controllers;


use App\Order;
use App\Ticket;
use App\TicketOrder;

class OrderController extends Controller
{
    public function manageOrderPage()
    {
        return view('admin.orders');
    }

    public function createOrderPage()
    {
        $order = Order::where('user_id', auth()->user()->id)
            ->where('is_finished', false)
            ->first();

        $items = array();
        $price = 0;


        if ($order) {
            $items = TicketOrder::where('order_id', $order->id)
                ->with('ticket')
                ->get();
        }

        foreach ($items as $item) {
            $price += $item->ticket->price * $item->ticket_count;
        }

        return view('website.pages.order', [
            'tickes' => Ticket::all(),
            'items' => $items,
            'price' => $price
        ]);
    }

    public function removeOrder()
    {
    }

    public function clearCartAction()
    {
        $order = Order::where('user_id', auth()->user()->id)
            ->where('is_finished', false)
            ->first();

        $items = TicketOrder::where('order_id', $order->id)
            ->with('ticket')
            ->delete();

        return $this->createOrderPage();
    }

    public function addToCartAction()
    {
        $this->validate(request(), [
            'ticket_count' => 'required|integer',
            'item' => 'required'
        ]);

        $order = Order::where('user_id', auth()->user()->id)
            ->where('is_finished', false)
            ->first();

        if (!$order) {
            $order = new Order([
                'is_finished' => false,
                'user_id' => auth()->user()->id
            ]);

            $order->save();
        }

        $ticketOrder = new TicketOrder([
            'order_id' => $order->id,
            'ticket_id' => request(['item'])['item'],
            'ticket_count' => request(['ticket_count'])['ticket_count']
        ]);

        $ticketOrder->save();

        return $this->createOrderPage();
    }


    public function addOrderAction()
    {
        $order = Order::where('user_id', auth()->user()->id)
            ->where('is_finished', false)
            ->first();

        if (!$order) {
            return redirect('');
        }

        $order->is_finished = true;
        $order->save();


        return redirect('');
    }
}
