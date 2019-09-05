<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset(mix("/css/app.css")) }}"" rel="stylesheet">
    
    {{-- <link href="/css/modal.css" rel="stylesheet" > --}}
    {{-- <link href="/css/fullcalendar.min.css" rel="stylesheet"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="">
                    <!-- Collapsed Hamburger -->
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (Auth::guest())
                        <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name') }}
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="navbarText">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a 
                                        class="dropdown-item" 
                                        href="{{ route('settings') }}"
                                    >
                                        <i class="fas fa-user-cog fa-fw fa-btn"></i>
                                        Settings
                                    </a>
                                    <a 
                                        class="dropdown-item" 
                                        href="{{ url('/logout') }}" 
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    >   
                                        <i class="fas fa-sign-out-alt fa-fw fa-btn" aria-hidden="true"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset(mix("/js/manifest.js")) }}"></script>
    <script src="{{ asset(mix("/js/vendor.js")) }}"></script>
    <script src="{{ asset(mix("/js/app.js")) }}"></script>
    
</body>
</html>
