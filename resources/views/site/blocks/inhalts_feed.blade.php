@php
    $feedType = $block->input('feed_type') ?? 'events';
    $feedLayout = $block->input('feed_layout') ?? 'compact';
    $count = (int) ($block->input('count') ?? 3);
    $topicIds = $block->browserIds('topics');

    if ($feedType === 'events') {
        $query = \App\Models\Event::published()->orderBy('start_date', 'asc');
        $archiveUrl = route('events.index');
        $archiveLabel = 'Alle Veranstaltungen ansehen';
        $title = 'Veranstaltungen';
        $itemDateField = 'start_date';
    } else {
        $query = \App\Models\Article::published()->orderBy('publish_start_date', 'desc');
        $archiveUrl = route('articles.index');
        $archiveLabel = 'Alle Meldungen ansehen';
        $title = 'Meldungen';
        $itemDateField = 'start_date';
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
    // dd($items->first()->getTable());
@endphp

<section class="my-12 w-full">
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-gray-900">{{ $title }}</h2>
    </div>

    @if($items->isNotEmpty())
        @if($feedLayout === 'detailed')
            <x-feed.detailed :items="$items" :feedType="$feedType" :archiveUrl="$archiveUrl" :archiveLabel="$archiveLabel"/>
        @elseif($feedLayout === 'cards')
            <x-feed.card :items="$items" :feedType="$feedType" :archiveUrl="$archiveUrl" :archiveLabel="$archiveLabel"/>
        @else
            <x-feed.compact :items="$items" :feedType="$feedType" :archiveUrl="$archiveUrl" :archiveLabel="$archiveLabel"/>
        @endif
    @else
        <p class="text-gray-500 italic">Keine Einträge gefunden.</p>
    @endif
</section>
