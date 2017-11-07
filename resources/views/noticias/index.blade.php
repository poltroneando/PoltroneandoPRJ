@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel">
        <div class="text-center subtitle">
            <h5><strong>Notícias</strong></h5>
        </div>
        @foreach ($news as $noticia)
        <div class="noticia">
            <a href="{{$noticia->site_origem->url}}{{$noticia->url}}" target="_blank">
                <img src="data:image/jpeg;base64,{{base64_encode($noticia->image)}}" alt="{{$noticia->title}}">
            </a>
            <p class="origem-noticia"><small>Por {{ $noticia->site_origem->name }} em {{$noticia->time_and_date}}</small></p>
            <a href="{{$noticia->site_origem->url}}{{$noticia->url}}" target="_blank">
                <p class="titulo-noticia"><strong>{{ $noticia->title }}</strong></p> 
            </a>
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