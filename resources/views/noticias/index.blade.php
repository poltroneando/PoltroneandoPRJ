@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel">
        @foreach ($news as $noticia)
            <p> {{ $noticia->title }} </p>  
        @endforeach
    </div>
</div>
@endsection