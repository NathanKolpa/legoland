<ul class="header">
    <li><a href="{{ url('')  }}">Home</a></li>
    @if( auth()->check() )

        <li>
            <a href="{{ url('orders/create')  }}">Tickets</a>
        </li>

        <li class="nav-item">
            <a class="nav-link">Welkom, {{ auth()->user()->name }}</a>
        </li>
        <li>
           <a href="{{ url('logout')  }}">Logout</a>
        </li>
    @else
        <li><a href="{{ url('register') }}">Register</a></li>
        <li><a href="{{ url('login') }}">Login</a></li>
    @endif
</ul>
