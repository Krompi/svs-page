<x-layout.app title="Veranstaltungen">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <h1 class="text-4xl font-bold mb-12">Veranstaltungen</h1>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($items as $event)
                <x-cards.event :event="$event" />
            @empty
                <div class="md:col-span-3 text-center text-gray-600">
                    Keine Veranstaltungen gefunden.
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $items->links() }}
        </div>
    </div>
</x-layout.app>
