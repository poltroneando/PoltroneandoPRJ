@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel">
        <div class="text-center subtitle">
            <h5><strong>Notícias</strong></h5>
        </div>
        @foreach ($news as $noticia)
        <div class="noticia">
            <a href="">
                <img src="data:image/jpeg;base64,{{base64_encode($noticia->image)}}" alt="{{$noticia->title}}">
            </a>
            <p class="origem-noticia"><small>Por {{ $noticia->site_origem->name }} em {{$noticia->time_and_date}}</small></p>
            <p class="titulo-noticia"><strong>{{ $noticia->title }}</strong></p> 
            @if (empty($noticia->subtitle) == 0) 
                <p>{{$noticia->subtitle}}</p>
            @endif
        </div>
        @endforeach
        <div class="text-center">
            {{$news->links()}}
        </div>
    </div>    
</div>

@endsection