<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/blog', [PublicController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{article}', [PublicController::class, 'blogShow'])->name('blog.show');
