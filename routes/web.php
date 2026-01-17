<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/posts/nuevoPrueba', [PostController::class, 'nuevoPrueba']);
Route::get('/posts/editPrueba/{id}', [PostController::class, 'editPrueba']);
Route::resource('posts', PostController::class)->only('index', 'show', 'create', 'edit', 'destroy');
