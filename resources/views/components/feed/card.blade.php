@props(['items', 'feedType', 'archiveUrl', 'archiveLabel'])

<div class="w-full bg-white my-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($items as $item)
            <a href="{{ route($feedType . '.show', ['slug' => $item->slug]) }}"
                class="bg-white block max-w-sm border border-gray-300 rounded-sm shadow-xs hover:bg-gray-100 hover:shadow transition-all">

                @if ($item->cover_preview_url)
                    <img class="object-cover w-full h-40 rounded-t-sm " src="{{ $item->cover_preview_url }}"
                        alt="{{ $item->cover_alt }}">
                @else
                    <div
                        class="w w-full h-40 rounded-t-sm  aspect-3/2 bg-gray-200 flex items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </div>
                @endif
                <div class="px-3 py-4">
                    <span>{{ $item->publish_start_date?->locale('de')->isoFormat('DD. MMMM YYYY') }}</span>
                    <h3 class="font-semibold text-xl tracking-tight text-heading">{{ $item->title }}</h3>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-4">
        <a href="{{ $archiveUrl }}"
            class="inline-flex items-center gap-2 text-primary font-semibold border-b-2 border-transparent hover:border-primary transition-colors">
            {{ $archiveLabel }}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>
</div>
