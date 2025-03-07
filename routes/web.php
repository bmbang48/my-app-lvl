<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('hello', 'App/Http/Controllers/HelloController@index');
// Route::get('hello', [HelloController::class, 'index']);
// Route::post('hello', [HelloController::class, 'create']);
// Route::get('world', [HelloController::class, 'world_message']);

Route::get('posts', [PostController::class, 'index']);
