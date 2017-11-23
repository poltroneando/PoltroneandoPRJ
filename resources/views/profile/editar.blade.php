@extends('layouts.app')

@section('content')
<div class="topo-perfil">
<div class="profile-capa" style="background-image:url('{{ $user->capa}}')">
    <div class="profile-header">
        <img src="{{ $user->foto }}" class="profile-pic" style="width:130px; height:130px; border-radius:10%;"></br>
        <a class="profile-name">
            <span class="blockLink">{{ $user->nome }}</span>
            @if (empty($user->username) == 0)
                <p class="small">&#64{{ $user->username }}<p>
            @endif
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
        <form role="form" class="form-horizontal" method="POST" action="{{ url('/perfil/gravar') }}">
            {{ csrf_field() }}
            @if (empty($user->password))
                <div class="form-row">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Senha</label>
                        <input id="password" type="password" class="form-control" name="password" aria-describedby="addon2">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>  
                </div>
                
                <div class="form-row">
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="control-label">Confirmar Senha</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
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
                    <label for="nome" class="control-label">Nome</label>
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $user->nome }}">
                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @if (empty($user->username))
            <div class="form-row">
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="nome" class="control-label">Username</label>
                    <input id="nome" type="text" class="form-control" name="username" value="{{ old('username') }}">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @endif
            <div class="form-row-half">
                <div class="form-group">
                    <label for="genero" class="control-label">Gênero</label>
                    <select name="genero" class="form-control" title="Gênero"> 
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                        <option value="3">Outro</option>
                        <option value="4">Prefiro não declarar</option>                        
                    </select>
                </div>
            </div>
            <div class="form-row-half">
                <div class="form-group">
                    <label for="data_nascimento" class="control-label">Data de Nascimento</label>
                    <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="biografia" class="control-label">Bio</label>
                    <textarea id="biografia" type="textarea" class="form-control" name="biografia" value="{{ old('biografia') }}"></textarea>
                </div>
            </div>
            <button id="btn-salvar" type="submit" class="btn btn-primary" style="background-color: #083C52;">
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