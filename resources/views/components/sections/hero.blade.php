@props(['banners' => [], 'settings' => []])

@if(count($banners) > 0)
    @php
        $isSingle = count($banners) === 1;
    @endphp
    <section class="splide" aria-label="Banner Slider" id="hero-slider"
        data-splide="{{ json_encode([
            'type'   => $isSingle ? 'slide' : 'loop',
            'autoplay' => $isSingle ? false : ($settings['autoplay'] ?? true),
            'arrows' => $isSingle ? false : ($settings['arrows'] ?? true),
            'pagination' => $isSingle ? false : ($settings['pagination'] ?? true),
            'drag' => !$isSingle,
            'interval' => 5000,
            'pauseOnHover' => true,
        ]) }}">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($banners as $banner)
                    <li class="splide__slide">
                        <div class="relative bg-gray-200 min-h-[500px] flex items-center">
                            <div class="max-w-7xl mx-auto px-6 py-20 relative z-40 w-full">
                                <div class="bg-white p-8 rounded-xl shadow w-full md:w-1/2 lg:w-1/3">
                                    <h1 class="text-2xl md:text-3xl font-bold mb-4">
                                        {{ $banner->title }}
                                    </h1>
                                    <div class="flex flex-col gap-4">
                                        {!! $banner->renderBlocks() !!}
                                    </div>
                                </div>
                            </div>
                            @if($banner->hasImage('cover'))
                                <img src="{{ $banner->image('cover', 'default') }}" alt="{{ $banner->title }}" class="absolute top-0 left-0 w-full h-full object-cover z-0">
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elms = document.getElementsByClassName('splide');
        for (var i = 0, len = elms.length; i < len; i++) {
            var el = elms[i];
            var config = {};
            try {
                config = JSON.parse(el.getAttribute('data-splide'));
            } catch (e) {}
            new Splide(el, config).mount();
        }
    });
</script>
@endpush
