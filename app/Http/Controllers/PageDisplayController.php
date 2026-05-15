<?php

namespace App\Http\Controllers;

use A17\Twill\Facades\TwillAppSettings;
use App\Models\Article;
use App\Models\Banner;
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

        $blocksHtml = $page->blocks->isNotEmpty() ? $page->renderBlocks() : '';

        return view('site.page', [
            'item' => $page,
            'blocksHtml' => $blocksHtml,
        ]);
    }

    public function home(): View
    {
        $frontPage = null;
        try {
            $homepageSetting = TwillAppSettings::get('homepage.homepage.page');
            if ($homepageSetting && $homepageSetting->isNotEmpty()) {
                /** @var \App\Models\Page $frontPage */
                $frontPage = $homepageSetting->first();
            }
        } catch (\Exception $e) {
            // Settings not yet initialized
        }

        $eventsQuery = Event::where('published', true)
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
            ->take(2);

        $articlesQuery = Article::where('published', true)
            ->where(function ($query) {
                $query->whereNull('publish_start_date')
                    ->orWhere('publish_start_date', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('publish_end_date')
                    ->orWhere('publish_end_date', '>=', now());
            })
            ->orderBy('publish_start_date', 'desc')
            ->take(4);

        $events = $eventsQuery->get();
        $articles = $articlesQuery->get();

        $banners = Banner::where('published', true)
            ->orderBy('position', 'asc')
            ->get();

        try {
            $sliderSettings = [
                'autoplay' => TwillAppSettings::get('homepage.homepage.slider_autoplay'),
                'arrows' => TwillAppSettings::get('homepage.homepage.slider_arrows'),
                'pagination' => TwillAppSettings::get('homepage.homepage.slider_pagination'),
            ];
        } catch (\Exception $e) {
            $sliderSettings = [
                'autoplay' => true,
                'arrows' => true,
                'pagination' => true,
            ];
        }

        if ($frontPage && $frontPage->published) {
            return view('site.home', [
                'item' => $frontPage,
                'events' => $events,
                'articles' => $articles,
                'banners' => $banners,
                'sliderSettings' => $sliderSettings,
            ]);
        }

        return view('site.home', [
            'item' => null,
            'events' => $events,
            'articles' => $articles,
            'banners' => $banners,
            'sliderSettings' => $sliderSettings,
        ]);
    }
}
