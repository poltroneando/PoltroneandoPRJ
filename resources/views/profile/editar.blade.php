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
        <div class="alert alert-danger alert-incompleto">
            <strong>Atenção!</strong> Complete as informações de seu perfil para que sua experiência no Poltroneando seja a melhor possível
        </div>
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