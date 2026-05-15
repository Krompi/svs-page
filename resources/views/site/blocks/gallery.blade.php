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
        @php
            $images = $block->images('gallery', 'default');
            $originalImages = $block->images('gallery', 'original');
            $medias = $block->medias('gallery')->get();
        @endphp
        @foreach($images as $index => $image)
            @php
                $media = $medias->get($index);
                $alt = $media
                    ? (data_get($media, 'pivot.metadatas.default.altText')
                        ?? data_get($media, 'pivot.metadatas.default.alt_text')
                        ?? data_get($media, 'metadatas.default.altText')
                        ?? data_get($media, 'metadatas.default.alt_text')
                        ?? data_get($media, 'alt_text')
                        ?? '')
                    : '';
            @endphp
            <a href="{{ data_get($originalImages, $index, $image) }}"
               class="lightbox-item block overflow-hidden rounded-sm hover:shadow transition-shadow duration-300 border border-gray-300"
               data-index="{{ $index }}"
               data-lightbox="gallery-{{ $block->id }}">
                <img src="{{ $image }}" alt="{{ $alt }}" class="w-full aspect-video object-cover">
            </a>
        @endforeach
    </div>
</div>
