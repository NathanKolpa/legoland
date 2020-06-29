<?php

namespace App\Http\Controllers;


class SettingsController extends Controller
{
    public function settingsPage()
    {
        return view("website/pages/settings", [
            'wants_newsletter' => auth()->user()->wants_newsletter
        ]);
    }

    public function updateUserAction()
    {
        auth()->user()->wants_newsletter = isset(request(['wants_newsletter'])['wants_newsletter']);
        auth()->user()->save();

        return redirect('');
    }
}
    
