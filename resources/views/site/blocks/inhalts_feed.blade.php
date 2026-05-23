@php
    $feedType = $block->input('feed_type') ?? 'events';
    $count = (int) ($block->input('count') ?? 3);
    $topicIds = $block->browserIds('topics');

    if ($feedType === 'events') {
        $query = \App\Models\Event::published()->orderBy('start_date', 'asc');
        $archiveUrl = route('events.index');
        $archiveLabel = 'Alle Veranstaltungen ansehen';
        $title = 'Veranstaltungen';
    } else {
        $query = \App\Models\Article::published()->orderBy('publish_start_date', 'desc');
        $archiveUrl = route('articles.index');
        $archiveLabel = 'Alle Meldungen ansehen';
        $title = 'Meldungen';
    }

    if (!empty($topicIds)) {
        $query->where(function($q) use ($topicIds) {
            $q->whereIn('main_topic_id', $topicIds)
              ->orWhereHas('topics', function($sq) use ($topicIds) {
                  $sq->whereIn('topics.id', $topicIds);
              });
        });
    }

    $items = $query->take($count)->get();
@endphp

<section class="my-12 w-full">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">{{ $title }}</h2>
    </div>

    @if($items->isNotEmpty())
        <div class="space-y-8">
            @foreach($items as $item)
                @if($feedType === 'events')
                    <x-cards.event :event="$item" />
                @else
                    <x-cards.article :article="$item" />
                @endif
            @endforeach
        </div>

        <div class="mt-10">
            <a href="{{ $archiveUrl }}" class="inline-flex items-center gap-2 text-primary font-semibold border-b-2 border-transparent hover:border-primary transition-colors">
                {{ $archiveLabel }}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    @else
        <p class="text-gray-500 italic">Keine Einträge gefunden.</p>
    @endif
</section>
