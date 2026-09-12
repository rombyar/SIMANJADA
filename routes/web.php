<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/load-more/{section}', [PublicController::class, 'loadMore'])
    ->whereIn('section', ['schedules', 'activities', 'announcements', 'finances', 'articles'])
    ->name('load-more');
Route::get('/blog', [PublicController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{article}', [PublicController::class, 'blogShow'])->name('blog.show');
Route::get('/schedules', [PublicController::class, 'scheduleIndex'])->name('schedule.index');
Route::get('/activities', [PublicController::class, 'activityIndex'])->name('activity.index');
Route::get('/announcements', [PublicController::class, 'announcementIndex'])->name('announcement.index');
Route::get('/finances', [PublicController::class, 'financeIndex'])->name('finance.index');
