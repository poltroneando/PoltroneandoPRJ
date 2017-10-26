@extends('layouts.app')

@section('content')
<div class="topo-perfil">
<div class="profile-capa" style="background-image:url('/uploads/covers/{{ $user->capa}}'">
    <div class="profile-header">
        <img src="{{ $user->foto }}" class="profile-pic" style="width:130px; height:130px; border-radius:10%;"></br>
        <a class="profile-name">
            <span class="blockLink">{{ $user->nome }}</span>
        </a>
    </div>
</div>
</div>
<div class="container">
    <div class="panel">
        @if ($user->verificado == 0)
            <div class="alert alert-danger alert-incompleto">
                <strong>Atenção!</strong> Complete as informações de seu perfil para que sua experiência no Poltroneando seja a melhor possível
            </div>
        @endif
        <form role="form" method="POST" action="{{ url('/perfil/gravar') }}">
            {{ csrf_field() }}
            @if (empty($user->password))
                <div class="form-row">
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
                </div>
                
                <div class="form-row">
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
                </div>
            @endif
            <div class="form-row">
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
            </div>
            <div class="form-row">
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="nome" class="control-label sr-only">Username</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon2"><span class="glyphicon glyphicon-user"></span></span>                 
                        <input id="nome" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}">
                    </div>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #083C52;">
                Salvar Dados
            </button>    
        </form>
    </div>
</div>
<div class="modal fade" id="profile-picture" role="dialog">
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-body">
            <img src="{{ $user->foto }}" id="img-modal">
        </div>
        <div class="modal-footer">
            <form enctype="multipart/form-data" action="/perfil" method="POST">
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-sm btn-primary">
            </form>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>                
        </div>
    </div>
</div>
</div>
@endsection