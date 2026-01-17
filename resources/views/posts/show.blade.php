@extends('plantilla')
@section('titulo', 'Ficha post')
@section('contenido')


    <div class="card">
        <h5 class="card-header">{{ $post->titol }}</h5>
        <div class="card-body">
            <p class="card-text">{{ $post->contingut }}</p>
            <div class="d-flex justify-content-between"><a href="{{ route('posts.index') }}" class="card-link"><i class="bi bi-arrow-left-circle"></i></a><span class="text-body-secondary">Publicado {{ $post->created_at->format('d/m/Y') }}</span></div>
        </div>
    </div>




@endsection
