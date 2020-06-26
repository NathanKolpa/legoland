<?php
namespace App\Http\Controllers;


use App\User;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view("website/pages/login");
    }

    public function loginAction()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        auth()->attempt(request(['email', 'password']));

        return redirect('');
    }

    public function registerPage()
    {
        return view("website/pages/register");
    }

    public function registerAction()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = new User(request(['name', 'email', 'password']));
        $user->save();

        auth()->login($user);

        return view("website/pages/home");
    }

    public function logoutAction()
    {
        auth()->logout();
        return redirect('');
    }
}
