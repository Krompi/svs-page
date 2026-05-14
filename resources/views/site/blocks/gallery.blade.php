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
        @foreach($block->imagesAsArrays('gallery', 'default') as $index => $image)
            <a href="{{ $image['src'] }}"
               class="gallery-item block overflow-hidden rounded-sm hover:shadow transition-shadow duration-300 border border-gray-300"
               data-index="{{ $index }}"
               data-gallery="gallery-{{ $block->id }}">
                <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="w-full aspect-video object-cover">
            </a>
        @endforeach
    </div>
</div>

@once
    @push('scripts')
        <div id="lightbox" class="fixed inset-0 z-50 hidden bg-black/90 flex items-center justify-center p-4">
            <button id="lightbox-close" class="absolute top-4 right-4 text-white text-4xl">&times;</button>
            <button id="lightbox-prev" class="absolute left-4 text-white text-4xl p-4">&lsaquo;</button>
            <button id="lightbox-next" class="absolute right-4 text-white text-4xl p-4">&rsaquo;</button>
            <div class="max-w-4xl max-h-full">
                <img id="lightbox-img" src="" class="max-w-full max-h-screen object-contain">
                <p id="lightbox-caption" class="text-white text-center mt-4"></p>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const lightbox = document.getElementById('lightbox');
                const lightboxImg = document.getElementById('lightbox-img');
                const lightboxCaption = document.getElementById('lightbox-caption');
                const closeBtn = document.getElementById('lightbox-close');
                const prevBtn = document.getElementById('lightbox-prev');
                const nextBtn = document.getElementById('lightbox-next');

                let currentGallery = [];
                let currentIndex = 0;

                function openLightbox(index, galleryItems) {
                    currentGallery = Array.from(galleryItems).map(item => ({
                        src: item.getAttribute('href'),
                        alt: item.querySelector('img').getAttribute('alt')
                    }));
                    currentIndex = index;
                    updateLightbox();
                    lightbox.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }

                function updateLightbox() {
                    const item = currentGallery[currentIndex];
                    lightboxImg.src = item.src;
                    lightboxCaption.textContent = item.alt;
                }

                function next() {
                    currentIndex = (currentIndex + 1) % currentGallery.length;
                    updateLightbox();
                }

                function prev() {
                    currentIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
                    updateLightbox();
                }

                document.querySelectorAll('.gallery-item').forEach(item => {
                    item.addEventListener('click', function(e) {
                        e.preventDefault();
                        const galleryId = this.getAttribute('data-gallery');
                        const galleryItems = document.querySelectorAll(`[data-gallery="${galleryId}"]`);
                        const index = parseInt(this.getAttribute('data-index'));
                        openLightbox(index, galleryItems);
                    });
                });

                closeBtn.addEventListener('click', () => {
                    lightbox.classList.add('hidden');
                    document.body.style.overflow = '';
                });

                nextBtn.addEventListener('click', next);
                prevBtn.addEventListener('click', prev);

                document.addEventListener('keydown', (e) => {
                    if (lightbox.classList.contains('hidden')) return;
                    if (e.key === 'Escape') closeBtn.click();
                    if (e.key === 'ArrowRight') next();
                    if (e.key === 'ArrowLeft') prev();
                });

                lightbox.addEventListener('click', (e) => {
                    if (e.target === lightbox) closeBtn.click();
                });
            });
        </script>
    @endpush
@endonce
