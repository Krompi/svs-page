<x-layout.app :title="$item->title">
    <article class="max-w-4xl mx-auto px-6 py-16">
        <header class="mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 leading-tight">{{ $item->title }}</h1>

            <div class="flex items-center text-gray-500 gap-4 mb-8">
                <time datetime="{{ $item->publish_start_date?->toIso8601String() }}" class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008Zm0 2.25h.008v.008H9.75v-.008Zm2.25-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    {{ $item->publish_start_date?->locale('de')->isoFormat('DD. MMMM YYYY') }}
                </time>
            </div>

            <div class="flex flex-col items-start md:flex-row gap-6">
                @if ($item->cover_url)
                    <div
                        class="order-0 md:order-1 rounded-lg overflow-hidden shadow md:mb-0 border-sm border-gray-300 w-full md:w-1/3">
                        <img src="{{ $item->cover_url }}" alt="{{ $item->cover_alt }}"
                            class="w-full h-auto object-cover max-h-96">
                    </div>
                @endif

                @if ($item->teaser)
                    <p
                        class="text-lg text-gray-700 leading-relaxed font-medium border-l-4 border-primary pl-6 italic w-full md:w-2/3">
                        {{ $item->teaser }}
                    </p>
                @endif
            </div>
        </header>

        <div
            class="prose prose-lg max-w-none prose-primary prose-headings:text-gray-900 prose-a:text-primary hover:prose-a:text-primary/80">
            {!! $item->renderBlocks() !!}
        </div>

        <footer class="mt-16 pt-8 border-t border-gray-200">
            <a href="{{ route('articles.index') }}"
                class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Zurück zur Übersicht
            </a>
        </footer>
    </article>
</x-layout.app>
