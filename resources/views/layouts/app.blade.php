<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Poltroneando</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/estilo.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/login.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/menu.css')}}"> 
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="shortcut icon" href="{{{ asset('public/favicon.ico') }}}">

    <style>
        body {
            font-family: 'Helvetica';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <div class="topo-bar">

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('public/imgs/marca.png') }}" class="img-brand" alt="Poltroneando" style="max-height:35px;">
        </a>
    </div>

    <nav class="nav nav-aberta">
        <div class="wrap">
            <ul class="listaNav">
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login ou Cadastrar</a></li>
                @else
                <li><a href="{{ url('/perfil') }}">
                        {{ Auth::user()->nome }} <span class="caret"></span>
                    </a>
                    <ul>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                @endif
                <li><a href="{{ url('/noticias') }}">Notícias</a></li>
                <li><a href="#">Item 4</a></li>
                <li><a href="#">Item 5</a></li>
                <li><a href="#">Item 6</a></li>
                <li><a href="#">Item 7</a></li>
                <li><a href="#">Item 8</a></li>
                <li><a href="#">Item 9</a></li>
            </ul>
        </div>
    </nav>
 
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('public/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/js/menu.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
