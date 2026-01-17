<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->nuevoPrueba();
        return redirect()->route('inicio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->editPrueba($id);
        return redirect()->route('inicio');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('mensaje_ok', 'Post eliminat correctament.');
    }

    function nuevoPrueba(){
        $post = new Post();
        $rand  = rand(1,1000);
        $post->titol = 'Post ' . $rand;
        $post->contingut = 'Contingut del nou post ' . $rand;
        $post->save();
        return redirect()->route('posts.index')->with('mensaje_ok', 'Post afegit correctament.');
    }

    function editPrueba($id){
        $post = Post::findOrFail($id);
        $post->titol .= '[Editat]';
        $post->contingut .= '[Editat]';
        $post->save();
        return redirect()->route('posts.index')->with('mensaje_ok', 'Post modificat correctament.');
    }
}
