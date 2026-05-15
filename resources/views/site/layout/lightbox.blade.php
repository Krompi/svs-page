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
                alt: item.querySelector('img') ? item.querySelector('img').getAttribute('alt') : ''
            }));
            currentIndex = index;
            updateLightbox();
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function updateLightbox() {
            const item = currentGallery[currentIndex];
            if (!item) return;
            lightboxImg.src = item.src;
            lightboxCaption.textContent = item.alt;

            if (currentGallery.length > 1) {
                prevBtn.classList.remove('hidden');
                nextBtn.classList.remove('hidden');
            } else {
                prevBtn.classList.add('hidden');
                nextBtn.classList.add('hidden');
            }
        }

        function next() {
            currentIndex = (currentIndex + 1) % currentGallery.length;
            updateLightbox();
        }

        function prev() {
            currentIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
            updateLightbox();
        }

        document.querySelectorAll('.lightbox-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const lightboxId = this.getAttribute('data-lightbox');
                const galleryItems = document.querySelectorAll(`[data-lightbox="${lightboxId}"]`);
                const index = Array.from(galleryItems).indexOf(this);
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
            if (currentGallery.length > 1) {
                if (e.key === 'ArrowRight') next();
                if (e.key === 'ArrowLeft') prev();
            }
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeBtn.click();
        });
    });
</script>
