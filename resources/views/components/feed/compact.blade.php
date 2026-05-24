@props(['items', 'feedType', 'archiveUrl', 'archiveLabel'])

<div class="w-full bg-white border border-gray-300 rounded-sm shadow-xs my-6">
    <ul role="list" class="space-y-3 px-3 py-4 divide-y divide-gray-300">
        @foreach ($items as $item)
            <li class="flex items-center justify-between pb-3 last:pb-0">
                <span class="text-body">
                    <a href="{{ route($feedType . '.show', ['slug' => $item->slug]) }}"
                        class="text-primary border-b-2 border-transparent hover:border-primary font-semibold inline-flex items-center gap-1 focus:outline-none focus:ring-2 focus:ring-primary">
                        {{ $item->title }}
                    </a>
                </span>
                <span class="text-body">
                    {{ $item->publish_start_date?->locale('de')->isoFormat('DD. MMMM YYYY') }}
                </span>
            </li>
        @endforeach
    </ul>
    <div class="mt-4 px-3 pb-4 text-right">
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
