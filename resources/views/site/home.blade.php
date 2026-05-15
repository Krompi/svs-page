<x-layout.app :title="$item?->title ?? 'Startseite'">
    <x-sections.hero :banners="$banners" :settings="$sliderSettings" />
    <x-sections.events :events="$events" />
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10">
            <x-sections.article :articles="$articles" />
            <x-sections.topics />
            <x-sections.about />
            <x-sections.downloads />
        </div>
    </section>
    <x-sections.cta />
</x-layout.app>
