<x-layout.app :title="$item->title">
    <article class="max-w-4xl mx-auto px-6 py-16">

        <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 leading-tight">{{ $item->title }}</h1>

        <div class="md:flex gap-6 text-gray-600 mb-8">
            <div class="order-none md:order-last w-full md:w-1/3">
                @if ($item->cover_url)
                    <div class="overflow-hidden mb-4">
                        <img src="{{ $item->cover_url }}" alt="{{ $item->cover_alt }}"
                            class="w-full h-auto object-cover max-h-[500px]">
                    </div>
                @endif 
                @if ($item->end_date)
                    <div class="flex items-center gap-3 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008Zm0 2.25h.008v.008H9.75v-.008Zm2.25-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                        <span
                            class="font-medium text-gray-900">
                            {{ $item->localized_start_date?->isoFormat('DD. MMMM YYYY') }} - {{ $item->localized_end_date?->isoFormat('DD. MMMM YYYY') }}
                        </span>
                    </div>
                @else
                    <div class="flex items-center gap-3 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008Zm0 2.25h.008v.008H9.75v-.008Zm2.25-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                        <span
                            class="font-medium text-gray-900">{{ $item->localized_start_date?->isoFormat('DD. MMMM YYYY') }}</span>
                        @if ($item->start_time)
                            <time datetime="{{ $item->start_time?->format('H:i') }}"
                                class="font-medium text-gray-900">{{ $item->start_time_display }} Uhr</time>
                        @endif
                    </div>
                @endif 
                @if ($item->location)
                    <div class="flex items-start gap-3 md:col-span-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-primary mt-0.5 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <div>
                            @if ($item->location_url)
                                <a href="{{ $item->location_url }}" class="text-primary hover:underline font-medium"
                                    target="_blank" rel="noopener noreferrer">{{ $item->location }}</a>
                            @else
                                <span class="font-medium text-gray-900">{{ $item->location }}</span>
                            @endif
                        </div>
                    </div>
                @endif 
                @if ($item->articles->isNotEmpty())
                    <div class="flex items-start gap-3 mt-4 md:col-span-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-primary mt-0.5 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v2.625c0 .621-.504 1.125-1.125 1.125h-3.621l-1.94 1.94a1.125 1.125 0 0 1-1.586 0l-1.94-1.94H5.625A1.125 1.125 0 0 1 4.5 16.875V14.25m16.5-12V6a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V2.25M16.5 9h2.25M16.5 12h2.25M4.5 9h2.25M4.5 12h2.25" />
                        </svg>
                        <div>
                            <span class="font-medium text-gray-900">Verwandte Artikel:</span>
                            <ul class="list-disc mt-1">
                                @foreach ($item->articles as $article)
                                    <li>
                                        <a href="{{ route('articles.show', $article->slug) }}"
                                            class="text-primary hover:underline">{{ $article->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="w-full md:w-2/3">
                {!! $item->renderBlocks() !!}
            </div>
        </div>

        <footer class="mt-16 pt-8 border-t border-gray-200">
            <a href="{{ route('events.index') }}"
                class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Alle Veranstaltungen ansehen
            </a>
        </footer>
    </article>
</x-layout.app>
