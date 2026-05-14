@props(['articles' => []])
<div>
    <h2 class="text-2xl font-semibold mb-6">Meldungen</h2>

    <div class="space-y-6">
        @forelse($articles as $article)
            <x-cards.article :article="$article" />
        @empty
            <div class="text-gray-600">
                Keine aktuellen Meldungen gefunden.
            </div>
        @endforelse

        @if($articles->isNotEmpty())
            <a href="{{ route('articles.index') }}"
                class="text-primary border-b-2 border-transparent hover:border-primary font-semibold inline-block mt-4">Alle ansehen
                →</a>
        @endif
    </div>
</div>
