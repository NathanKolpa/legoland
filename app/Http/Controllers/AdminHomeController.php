<?php
namespace App\Http\Controllers;


class AdminHomeController extends Controller
{
    public function index()
    {
        if(!auth()->check() || !auth()->user()->is_admin)
            return redirect('');

        return view("admin/admin");
    }
}
