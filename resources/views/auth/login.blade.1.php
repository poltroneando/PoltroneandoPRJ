@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-md-8 col-md-offset-2">
            <img src="/imgs/marca.png" class="img-login" alt="Poltroneando" style="max-width: 300px;">
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="btn-group" role="group" aria-label="..." data-toggle="buttons">
                <button type="button" id="btn-login" style="width: 100px;" class="btn btn-primary @if ($tipo==0) active @endif">Login</button>
                <button type="button" id="btn-cadast" style="width: 100px;" class="btn btn-primary @if ($tipo) active @endif">Cadastrar</button>
            </div>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
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
           <!--         <div class="col-md-6 col-md-offset-4">-->
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Lembrar de mim
                        </label>
                    </div>
                    <!-- </div> -->
                </div>

                <div class="form-group">
                <!--    <div class="col-md-6 col-md-offset-4"> -->
                    <button type="submit" class="btn btn-primary" style="background-color: #083C52;">
                        <i class="fa fa-btn fa-sign-in"></i> Login
                    </button>

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Esqueceu a senha?</a>
                <!--    </div>  -->
                </div>
                <a href="{{ url('/login/facebook') }}" class="btn btn-primary">
                    Facebook
                </a>
                <a href="{{ url('/login/google') }}" class="btn btn-primary">
                    Google
                </a>
            </form>
            <form class="form-horizontal @if ($tipo==0) form-login-hide @endif" id="form-cadast" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome" class="control-label sr-only">Nome</label>

                    <input id="nome" type="text" class="form-control" name="nome" placeholder="Nome" value="{{ old('nome') }}">

                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label sr-only">E-Mail</label>

                   <!-- <div class="col-md-6"> -->
                    <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                   <!-- </div> -->
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label sr-only">Senha</label>

                    <!-- <div class="col-md-6"> -->
                    <input id="password" type="password" class="form-control" placeholder="Senha" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                   <!-- </div> -->
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="control-label sr-only">Confirmar Senha</label>

                    <!-- <div class="col-md-6"> -->
                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Senha" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                    <!-- </div> -->
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="background-color: #083C52;">
                            <i class="fa fa-btn fa-user"></i> Cadastrar
                        </button>
                    </div>
                </div>
            </form> 
        </div>        
    </div>
</div>
@endsection