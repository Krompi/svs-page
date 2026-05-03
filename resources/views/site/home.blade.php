<x-layout.app>
    <x-sections.hero />
    <x-sections.events :events="$events" />
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10">
            <x-sections.news />
            <x-sections.topics />
            <x-sections.about />
            <x-sections.downloads />
        </div>
    </section>
    <x-sections.cta />
</x-layout.app>
