<?php
namespace App\Http\Controllers;


use App\Order;
use App\User;

class AdminHomeController extends Controller
{
    public function index()
    {
        if(!auth()->check() || !auth()->user()->is_admin)
            return redirect('');

        return view("admin/admin");
    }
}
