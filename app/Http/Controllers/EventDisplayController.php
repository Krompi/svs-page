<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use Illuminate\Contracts\View\View;

class EventDisplayController extends Controller
{
    public function index(): View
    {
        return view('site.events.index');
    }
    public function show(string $slug, EventRepository $eventRepository): View
    {
        $event = $eventRepository->forSlug($slug);
 
        if (!$event) {
            abort(404);
        }
 
        return view('site.events.show', ['item' => $event]);
    }
}
