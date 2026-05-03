@props(['event'])

<article
    class="group flex flex-col bg-white rounded border border-gray-300 hover:shadow-lg transition-shadow duration-300 overflow-hidden">
    <div class="relative">
        @if ($event->cover_preview_url)
            <img src="{{ $event->cover_preview_url }}" alt="{{ $event->cover_alt }}" loading="lazy" decoding="async"
                class="w-full h-48 object-cover rounded-t">
        @else
            <div class="w-full h-48 bg-gray-300 rounded-t"></div>
        @endif

        <div
            class="bg-accent text-center font-medium py-2 mb-3 absolute top-0 left-0 w-16 rounded-tl rounded-br uppercase">
            <span class="block -mb-1 text-3xl">{{ $event->start_date_day }}</span>
            <span class="block -mb-1 text-xl">{{ $event->start_date_month }}</span>
            <span class="block">{{ $event->start_date_year }}</span>
        </div>
    </div>

    <div class="p-5 pb-0 grow">
        <h3 class="font-semibold mb-2 text-xl">{{ $event->title }}</h3>
        <div class="text-gray-500 mb-3 space-y-3">
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <span class="sr-only">Datum</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008Zm0 2.25h.008v.008H9.75v-.008Zm2.25-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <span>{{ $event->localized_start_date?->isoFormat('DD.MM.YYYY') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="sr-only">Uhrzeit</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <time datetime="{{ $event->start_time?->format('H:i') }}">{{ $event->start_time_display }}
                        Uhr</time>
                </div>
            </div>
            @if($event->location)
            <div class="flex items-center gap-2">
                <span class="sr-only">Ort</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                @if ($event->location_url)
                <a href="{{ $event->location_url }}" class="text-primary border-b-2 border-transparent hover:border-primary" target="_blank" rel="noopener noreferrer">{{ $event->location }}</a>
                @else
                <span>{{ $event->location }}</span>
                @endif
            </div>
            @endif
        </div>
        <p class="mb-4 leading-6 text-gray-700">{{ $event->teaser }}</p>
    </div>
    <div class="p-5 pt-0">
        <a href="{{ route('events.show', ['slug' => $event->slug]) }}"
            class="text-primary hover:border-b-2 hover:border-primary font-semibold inline-flex items-center gap-1 focus:outline-none focus:ring-2 focus:ring-primary">
            Details →
        </a>
    </div>
</article>
