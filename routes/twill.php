<?php

use A17\Twill\Facades\TwillRoutes;
use Illuminate\Support\Facades\Route;

// Register Twill routes here eg.
// TwillRoutes::module('posts');

TwillRoutes::module('pages');
TwillRoutes::module('menuLinks');
TwillRoutes::module('events');

Route::name('events.createArticle')->post('events/createArticle/{id}', 'EventController@createArticle');

TwillRoutes::module('articles');
