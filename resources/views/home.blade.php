@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Notícias</div>

                <div class="panel-body">
                @foreach ($news as $noticia)
                    <div class="noticia">
                        @if ($noticia->news_site_id == 1)
                            <a href="{{$noticia->site_origem->url}}{{$noticia->link}}" target="_blank">
                        @else
                            <a href="{{$noticia->link}}" target="_blank">
                        @endif
                            <img src="data:image/jpeg;base64,{{base64_encode($noticia->image)}}" alt="{{$noticia->title}}">
                        </a>
                        <p class="origem-noticia"><small>Por {{ $noticia->site_origem->name }} em {{ $noticia->time_and_date->subHour(3)->format('d-m-Y H:i') }} </small></p>
                        @if ($noticia->news_site_id == 1)
                        <a href="{{$noticia->site_origem->url}}{{$noticia->link}}" target="_blank">
                        @else
                            <a href="{{$noticia->link}}" target="_blank">
                        @endif
                            <p class="titulo-noticia"><strong>{{ $noticia->title }}</strong></p> 
                        </a>
                        @if (empty($noticia->subtitle) == 0) 
                            <p>{{$noticia->subtitle}}</p>
                        @endif
                    </div>
                @endforeach                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
