@props(['events'])

<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Nächste Veranstaltungen</h2>
        <a href="#" class="text-primary text-sm">Alle ansehen →</a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach ($events as $event)
            <div class="bg-white rounded-xl shadow p-5">
                <div class="bg-accent text-center py-2 rounded mb-3 font-bold">
                    {{ $event->start_date->format('d.m.Y') }}
                </div>
                <h3 class="font-semibold mb-2">{{ $event->title }}</h3>
                <p class="text-sm text-gray-500 mb-2">
                    {{ $event->start_time->format('H:i') }} Uhr · {{ $event->location }}
                </p>
                <p class="text-sm mb-4">{{ $event->teaser }}</p>
                <a href="{{ route('events.show', ['slug' => $event->slug]) }}" class="text-primary text-sm">Details →</a>
            </div>
        @endforeach
    </div>
</section>
