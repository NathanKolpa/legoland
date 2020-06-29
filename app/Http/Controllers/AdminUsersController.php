<?php
namespace App\Http\Controllers;


use App\Order;
use App\User;

class AdminUsersController extends Controller
{

    public function manageUsersPage()
    {
        if(!auth()->check() || !auth()->user()->is_admin)
            return redirect('');

        $users = User::all();

        return view('admin/customers', [
            'users' => $users
        ]);
    }

    public function deleteUser(User $user)
    {
        if(!auth()->check() || !auth()->user()->is_admin)
            return redirect('');

        $user->delete();

        return redirect('/admin/users');
    }

    public function updateUser(User $user)
    {
        if(!auth()->check() || !auth()->user()->is_admin)
            return redirect('');

        $this->validate(request(), [
            'email' => 'required|email',
            'name' => 'required',
            'is_admin' => 'required|boolean',
        ]);

        $data = request(['email', 'is_admin', 'name']);

        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->is_admin = $data['is_admin'];

        $user->save();

        return redirect('/admin/users');
    }
}
