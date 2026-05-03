@props(['events'])

<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Nächste Veranstaltungen</h2>
        <a href="{{ route('events.index') }}"
            class="text-primary border-b-2 border-transparent hover:border-primary font-semibold">Alle ansehen →</a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        @forelse ($events as $event)
            <x-cards.event :event="$event" />
        @empty
            <div class="md:col-span-3 text-center text-gray-600">
                Keine nächsten Veranstaltungen gefunden.
            </div>
        @endforelse
    </div>
</section>
