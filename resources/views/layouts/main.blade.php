<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mini Blog - @yield('title')</title>
    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>-->
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>
    <style>
        .container {
            max-width: 1150px;
            margin: 0 auto;
            padding: 1em;
        }
        h2.title{
            font-weight: 600;
            font-size: 25px;
            margin-bottom: 1em;
        }
        h3{
            font-weight: 500;
            font-size: 20px;
            margin-bottom: 1em;
        }
    </style>
    
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
            @if( Auth::check() && mb_strtolower(Auth::user()->role) == "admin")
            <li>
                {{-- 
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Gestion</a> 
                @else
                    <a href="/{{ Auth::user()->role }}/articles">Gestion</a>
                @endguest
                --}}
                
                <a href="{{route("admin")}}">Administrer le site</a>
            </li>
            @elseif(Auth::check())
            <li>
                <a href="{{route("user_articles", ['user_id'=>Auth::user()->id])}}">Mes articles</a>
            </li>
            <li>
                <a href="{{route("user_admin")}}">Gestion des données</a>
            </li>
            @endif
        </ul>
    </div>

    <div class ="top-bar-right">
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <div style= "display:inline">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
            @if (Route::has('register'))              
                <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
            @endif
            </div>
        @else
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Se déconnecter') }}
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
    <div class="text-center">
        <h1 class=>MIASHS Blog</h1>
        <h2 class="subheader"></h2>
    </div>
</div>

<!-- We can now combine rows and columns when there's only one column in that row -->

    @yield('content') 


<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
    @stack("scripts")
</body>
</html>



