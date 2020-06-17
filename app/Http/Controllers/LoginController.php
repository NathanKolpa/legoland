<?php
namespace App\Http\Controllers;


class LoginController extends Controller
{
    public function loginPage()
    {
        return view("website/pages/home");
    }

    public function registerPage()
    {
        return view("website/pages/register");
    }

    public function register()
    {
        return view("website/pages/home");
    }
}
