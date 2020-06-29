<?php
namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view("website/pages/home");
    }

    public function contactPage()
    {
        return view("website/pages/contact");
    }
}
