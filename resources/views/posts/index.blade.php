@extends('plantilla')
@section('titulo', 'Listado de posts')
@section('contenido')
    <h1>Listado de posts</h1>
    @if(session()->has('mensaje_ok'))
        <div class="alert alert-success">
            {{ session('mensaje_ok') }}
        </div>
    @endif
    @forelse ($posts as $post)
        <div class="card my-2">
            <div class="card-body">
                <a class="button" href="{{ route('posts.show', $post) }}"></a> <a class="btn btn-dark"
                    href="{{ route('posts.show', $post) }}"><i class="bi bi-eyeglasses"></i></a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash "></i></button>
                </form>
                {{ $post->titol }} 
            </div>
        </div>
    @empty
        <h2>Encara no hi ha cap post publicat</h2>
    @endforelse
    <div class="my-4">
        {{ $posts->links() }}
    </div>


@endsection
