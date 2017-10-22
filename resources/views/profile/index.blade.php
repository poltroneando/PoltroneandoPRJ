@extends('layouts.app')

@section('content')
<div class="topo-perfil">
    <div class="profile-capa" style="background-image:url('/uploads/covers/{{ $user->capa}}'">
        <div class="profile-header">
            <img src="{{ $user->foto }}" class="profile-pic" style="width:130px; height:130px; border-radius:10%;"></br>
            <a class="profile-name">
                <span class="blockLink">{{ $user->nome }}</span>
            </a>
            <form enctype="multipart/form-data" action="/perfil" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection