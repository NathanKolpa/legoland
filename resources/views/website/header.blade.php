<ul class="header">
    <li><a href="{{ url('')  }}">Home</a></li>
    <li><a href="{{ url('contact')  }}">Contact</a></li>
    @if( auth()->check() )

        <li>
            <a href="{{ url('orders/create')  }}">Tickets</a>
        </li>

        <li class="nav-item">
            <a href="{{ url('self/settings') }}" class="nav-link">Welkom, {{ auth()->user()->name }}</a>
        </li>

        @if(auth()->user()->is_admin)
            <li class="nav-item">
                <a href="{{ url('admin') }}" class="nav-link">Admin Panel</a>
            </li>
        @endif

        <li>
            <a href="{{ url('logout')  }}">Logout</a>
        </li>
    @else
        <li><a href="{{ url('register') }}">Register</a></li>
        <li><a href="{{ url('login') }}">Login</a></li>
    @endif
</ul>
