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
                <img src="{{$noticia->image}}" alt="{{$noticia->title}}">
            </a>
            <p> {{ $noticia->title }} </p>  
        </div>
        @endforeach
        <div class="text-center">
            {{$news->links()}}
        </div>
    </div>    
</div>

@endsection