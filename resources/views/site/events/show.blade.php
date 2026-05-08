<x-layout.app :title="$item->title">
    <article class="max-w-4xl mx-auto px-6 py-16">
        <header class="mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 leading-tight">{{ $item->title }}</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600 mb-8">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008Zm0 2.25h.008v.008H9.75v-.008Zm2.25-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <span class="font-medium text-gray-900">{{ $item->localized_start_date?->isoFormat('DD. MMMM YYYY') }}</span>
                </div>

                @if($item->start_time)
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <time datetime="{{ $item->start_time?->format('H:i') }}" class="font-medium text-gray-900">{{ $item->start_time_display }} Uhr</time>
                </div>
                @endif

                @if($item->location)
                <div class="flex items-start gap-3 md:col-span-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary mt-0.5 shrink-0">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <div>
                        @if ($item->location_url)
                        <a href="{{ $item->location_url }}" class="text-primary hover:underline font-medium" target="_blank" rel="noopener noreferrer">{{ $item->location }}</a>
                        @else
                        <span class="font-medium text-gray-900">{{ $item->location }}</span>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            @if($item->cover_url)
                <div class="rounded-lg overflow-hidden shadow-lg mb-12">
                    <img src="{{ $item->cover_url }}" alt="{{ $item->cover_alt }}" class="w-full h-auto object-cover max-h-[500px]">
                </div>
            @endif

            @if($item->teaser)
                <p class="text-xl text-gray-700 leading-relaxed font-medium mb-8 border-l-4 border-accent pl-6 italic">
                    {{ $item->teaser }}
                </p>
            @endif
        </header>

        <div class="prose prose-lg max-w-none prose-primary prose-headings:text-gray-900 prose-a:text-primary hover:prose-a:text-primary/80">
            {!! $item->renderBlocks() !!}
        </div>

        <footer class="mt-16 pt-8 border-t border-gray-200">
            <a href="{{ route('events.index') }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Alle Veranstaltungen ansehen
            </a>
        </footer>
    </article>
</x-layout.app>
