<div class="my-12">
    @if($block->translatedInput('title'))
        <div class="prose max-w-none mb-2">
            <h2>{{ $block->translatedInput('title') }}</h2>
        </div>
    @endif

    @if($block->translatedInput('intro'))
        <div class="prose max-w-none mb-4 text-gray-700 italic">
            {!! $block->translatedInput('intro') !!}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" id="gallery-{{ $block->id }}">
        @foreach($block->images('gallery', 'default') as $index => $image)
            <a href="{{ $block->image('gallery', 'original', [], false, false, $index) }}"
               class="lightbox-item block overflow-hidden rounded-sm hover:shadow transition-shadow duration-300 border border-gray-300"
               data-index="{{ $index }}"
               data-lightbox="gallery-{{ $block->id }}">
                <img src="{{ $image }}" alt="{{ $block->imageAltText('gallery', $index) }}" class="w-full aspect-video object-cover">
            </a>
        @endforeach
    </div>
</div>
