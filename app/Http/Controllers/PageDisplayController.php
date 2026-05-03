<?php

namespace App\Http\Controllers;

use A17\Twill\Facades\TwillAppSettings;
use App\Models\Event;
use App\Repositories\EventRepository;
use App\Repositories\PageRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageDisplayController extends Controller
{
    public function show(string $slug, PageRepository $pageRepository): View
    {
        // dd($slug);
        $page = $pageRepository->forSlug($slug);
 
        if (!$page) {
            abort(404);
        }
 
        return view('site.page', ['item' => $page]);
    }
    public function event(string $slug, EventRepository $eventRepository): View
    {
        $event = $eventRepository->forSlug($slug);
        // dd($event->renderBlocks());
 
        if (!$event) {
            abort(404);
        }
 
        return view('site.page', ['item' => $event]);
    }

    public function home(): View
    {
        if (TwillAppSettings::get('homepage.homepage.page')->isNotEmpty()) {
            /** @var \App\Models\Page $frontPage */
            $frontPage = TwillAppSettings::get('homepage.homepage.page')->first();
            
            $events = Event::where('published', true)
                ->where(function ($query) {
                    $query->whereNull('publish_start_date')
                        ->orWhere('publish_start_date', '<=', now());
                })
                ->where(function ($query) {
                    $query->whereNull('publish_end_date')
                        ->orWhere('publish_end_date', '>=', now());
                })
                ->where('start_date', '>=', now())
                ->orderBy('start_date', 'asc')
                ->take(2)
                ->get();
                // dd($events->first()->start_date->locale('de')->isoFormat('MMM'));
 
            if ($frontPage->published) {
                return view('site.home', ['item' => $frontPage, 'events' => $events]);
            }
        }
 
        abort(404);
    }
}
