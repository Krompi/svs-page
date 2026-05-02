<?php

use App\Http\Controllers\EventDisplayController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PageDisplayController::class, 'home'])->name('frontend.home');

Route::get('/events/{slug}', [EventDisplayController::class, 'show'])->name('events.show'); 
Route::get('/events', [EventDisplayController::class, 'index'])->name('events.index'); 

Route::get('{slug}', [\App\Http\Controllers\PageDisplayController::class, 'show'])->name('frontend.page'); 
