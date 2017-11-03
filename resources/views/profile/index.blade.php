@extends('layouts.app')

@section('content')
<div class="topo-perfil">
    <div class="profile-capa" style="background-image:url('/uploads/covers/{{ $user->capa}}'">
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
    <div class="btn-group btn-group-justified">
        <a href="#" class="btn btn-primary">Histórico</a>
        <a href="#" class="btn btn-primary">Info</a>
        <a href="#" class="btn btn-primary">Amigos</a>
        <a href="#" class="btn btn-primary">Favoritos</a>
        <a href="#" class="btn btn-primary">Críticas</a>
        <a href="#" class="btn btn-primary">Listas</a>
        <a href="#" class="btn btn-primary">Conquistas</a>
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
                <form enctype="multipart/form-data" action="/perfil" method="POST">
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
@endsection