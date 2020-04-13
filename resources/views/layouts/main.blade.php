<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titre')</title>
    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>-->
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">

    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/css/mdb.min.css" rel="stylesheet">
    @yield('custom-styles')
</head>
<body>

<!-- Start Top Bar -->
<!-- Start Top Bar -->
<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li><a href="{{route("home")}}">Home</a></li>
            <li><a href="{{route("articles")}}">Articles</a></li>
            <li><a href="{{route("contact")}}">Contact</a></li>
            <li>
                {{-- 
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Gestion</a> 
                @else
                    <a href="/{{ Auth::user()->role }}/articles">Gestion</a>
                @endguest
                --}}
                
                <a href="{{route("admin")}}">Gestion</a>
            </li>
        </ul>
    </div>

    <div class ="top-bar-right">
    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                            @if (Route::has('register'))
                              
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                           
                            @endif
                        @else
                            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                           
                        @endguest
                    </ul>
    </div>
</div>
<!-- End Top Bar -->

<div class="callout large primary">
    <div class="row column text-center">
        <h1>MIASHS Blog</h1>
        <h2 class="subheader"></h2>
    </div>
</div>

<!-- We can now combine rows and columns when there's only one column in that row -->
<div class="row medium-8 large-7 columns">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
    @stack("scripts")
</body>
</html>



