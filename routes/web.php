<?php

use App\Http\Controllers\ArticleDisplayController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\EventDisplayController;
use App\Http\Controllers\PageDisplayController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PageDisplayController::class, 'home'])->name('frontend.home');

Route::post('/kontakt-anfrage', [ContactFormController::class, 'submit'])->name('contact.submit');

Route::get('/articles/{slug}', [ArticleDisplayController::class, 'show'])->name('articles.show');
Route::get('/articles', [ArticleDisplayController::class, 'index'])->name('articles.index');

Route::get('/events/{slug}', [EventDisplayController::class, 'show'])->name('events.show');
Route::get('/events', [EventDisplayController::class, 'index'])->name('events.index');

Route::get('{slug}', [PageDisplayController::class, 'show'])->name('frontend.page');
