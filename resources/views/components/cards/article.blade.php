@props(['article'])

<article class="flex group">
    <div class="w-1/3 shrink-0">
        @if ($article->cover_preview_url)
            <img class="object-cover w-full rounded aspect-3/2 group-hover:shadow-md transition-shadow" src="{{ $article->cover_preview_url }}"
                alt="{{ $article->cover_alt }}">
        @else
            <div class="w-full rounded aspect-3/2 bg-gray-200 flex items-center justify-center text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </div>
        @endif
    </div>
    <div class="flex flex-col justify-center pl-6 grow">
        <p class="text-sm text-gray-500 mb-1">{{ $article->publish_start_date?->locale('de')->isoFormat('DD. MMMM YYYY') }}</p>
        <h3 class="mb-2 font-semibold text-xl group-hover:text-primary transition-colors line-clamp-2">{{ $article->title }}</h3>
        <p class="mb-3 text-gray-700 line-clamp-2">{{ $article->teaser }}</p>
        <div>
            <a href="{{ route('articles.show', ['slug' => $article->slug]) }}"
                class="text-primary border-b-2 border-transparent hover:border-primary font-semibold inline-flex items-center gap-1 focus:outline-none focus:ring-2 focus:ring-primary">
                Details →
            </a>
        </div>
    </div>
</article>
