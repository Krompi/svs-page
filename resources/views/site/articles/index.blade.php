<x-layout.app title="Artikel">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <h1 class="text-4xl font-bold mb-12">Artikel</h1>

        <div class="grid md:grid-cols-2 gap-12">
            @foreach($items as $article)
                <x-cards.article :article="$article" />
            @endforeach
        </div>

        <div class="mt-12">
            {{ $items->links() }}
        </div>
    </div>
</x-layout.app>
