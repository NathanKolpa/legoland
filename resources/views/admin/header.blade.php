<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Legoland Doetinchem</title>
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>
<body>
    <!-- Starten admin -->
    <div class="admin">
        <nav class="sideMenu">
            <div class="logo">
                <img src="{{url('/images/LEGOLAND_PARKS_LOGO.svg')}}" alt="Image"/>
            </div>
            <ul>
                <li><a href="/admin">Home</a></li>
                <li><a href="/admin/klanten">Klanten</a></li>
                <li><a href="/admin/bestellingen">Bestellingen</a></li>
            </ul>
        </nav>
    