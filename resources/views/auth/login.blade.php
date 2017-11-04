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
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/login.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/estilo.css')}}"> 
    <link rel="shortcut icon" href="{{{ asset('public/favicon.ico') }}}">
    {{-- <link href="{{ elixir('css/login.css') }}" rel="stylesheet"> --}}

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
            <img src="public/imgs/marca.png" class="img-brand" alt="Poltroneando" style="max-height:35px;">
        </a>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="btn-group" role="group" aria-label="..." data-toggle="buttons">
                    <button type="button" id="btn-login" style="width: 100px;" class="btn1 @if ($tipo==0) active @endif"><b>Login</b></button>
                    <button type="button" id="btn-cadast" style="width: 100px;" class="btn1 @if ($tipo) active @endif"><b>Cadastrar</b></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <form class="form-horizontal @if ($tipo) form-login-hide @endif" id="form-login" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label sr-only">E-Mail</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="addon1"><span class="glyphicon glyphicon-envelope"></span></span> 
                            <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}" aria-describedby="addon1">
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label sr-only">Senha</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon2"><span class="glyphicon glyphicon-lock"></span></span> 
                        <input id="password" type="password" class="form-control" placeholder="Senha" name="password" aria-describedby="addon2">
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Lembrar de mim
                        </label>
                    </div> 
                </div>

                <div class="form-group">
                <!--    <div class="col-md-6 col-md-offset-4"> -->
                    <button type="submit" class="btn btn-primary" style="background-color: #083C52;">
                        <i class="fa fa-btn fa-sign-in"></i> Login
                    </button>

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Esqueceu a senha?</a>
                <!--    </div>  -->
                </div>
            </form>
            <form class="form-horizontal @if ($tipo==0) form-login-hide @endif" id="form-cadast" role="form" method="POST" action="{{ url('/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome" class="control-label sr-only">Nome</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon2"><span class="glyphicon glyphicon-user"></span></span>                 
                        <input id="nome" type="text" class="form-control" name="nome" placeholder="Nome" value="{{ old('nome') }}">

                    </div>
                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label sr-only">E-Mail</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon2"><span class="glyphicon glyphicon-envelope"></span></span>                 
                   <!-- <div class="col-md-6"> -->
                        <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}">
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class=" control-label sr-only">Senha</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon2"><span class="glyphicon glyphicon-lock"></span></span>                 
                        <input id="password" type="password" class="form-control" placeholder="Senha" name="password">

                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="control-label sr-only">Confirmar Senha</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon2"><span class="glyphicon glyphicon-lock"></span></span>                 
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Senha" name="password_confirmation">
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-xs-10 col-xs-offset-1 col-md-4">
                        <button type="submit" class="btn btn-primary btn-social" style="background-color: #083C52;">
                            <i class="fa fa-btn fa-user"></i> Cadastrar
                        </button>
                    </div>
                </div>
            </form> 
            
            </div>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-md-4">
            <a href="{{ url('/login/facebook') }}" class="btn btn-primary btn-social" id="facebook-btn">
                Facebook
            </a>
        </div> 
                   
        <div class="col-xs-10 col-xs-offset-1 col-md-4">
            <a href="{{ url('/login/google') }}" class="btn btn-primary btn-social" id="google-btn">
                Google
            </a>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('public/js/main.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
