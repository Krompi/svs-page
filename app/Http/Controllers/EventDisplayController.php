<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use Illuminate\Contracts\View\View;

class EventDisplayController extends Controller
{
    public function index(EventRepository $eventRepository): View
    {
        $events = $eventRepository->get([
            'published' => true,
        ], [
            'start_date' => 'asc',
        ], [], 12);

        return view('site.events.index', ['items' => $events]);
    }

    public function show(string $slug, EventRepository $eventRepository): View
    {
        $event = $eventRepository->forSlug($slug);

        if (!$event || !$event->published) {
            abort(404);
        }

        return view('site.events.show', ['item' => $event]);
    }
}
