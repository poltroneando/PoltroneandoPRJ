@extends('layouts.app')

@section('content')
<div class="topo-perfil">
    <div class="profile-capa" style="background-image:url('{{ $user->capa}}')">
        <div class="profile-header">
            <img src="{{ $user->foto }}" class="profile-pic" style="width:130px; height:130px; border-radius:10%;"></br>
            <a class="profile-name">
                <span class="blockLink">{{ $user->nome }}</span>
                @if (empty($user->username) == 0)
                <p class="small">&#64{{ $user->username }}</p>
                @endif
            </a>
        </div>
    </div>
    @if ($user == Auth::user())
        <button class="cng-cover"><span class="glyphicon glyphicon-camera"></span></button>
        <a href="{{ url('/perfil/editar') }}" class="button edit-perfil"><span class="glyphicon glyphicon-pencil"></span></a>
    @endif
</div>
<div class="container">
    <div class="btn-group btn-group-justified menu-opcao">
        <a href="#" class="btn btn-primary">Histórico</a>
        <a href="#" class="btn btn-primary">Info</a>
        <a href="#" class="btn btn-primary">Amigos</a>
        <a href="#" class="btn btn-primary">Favoritos</a>
        <a href="#" class="btn btn-primary fs">Críticas</a>
        <a href="#" class="btn btn-primary fs">Listas</a>
        <a href="#" class="btn btn-primary fs">Conquistas</a>        
        <div class="btn-group s650">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Críticas</a></li>
                <li><a href="#">Listas</a></li>
                <li><a href="#">Conquistas</a></li>
            </ul>
        </div> 
    </div>
</div>
<div class="container">
    <div class="panel">
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
                @if ($user == Auth::user())
                <form class="form-uppicture" enctype="multipart/form-data" action="/perfil" method="POST">
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-sm btn-primary">
                </form>
                @endif
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="profile-cover" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                @if ($user == Auth::user())
                <form class="form-upcover" enctype="multipart/form-data" action="/perfil/cover" method="POST">
                    <input type="file" name="cover">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-sm btn-primary">
                </form>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>                
            </div>
        </div>
    </div>
</div>
@endsection