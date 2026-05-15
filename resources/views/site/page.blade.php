<x-layout.app :title="$item->title">
    @if(isset($banners) && count($banners) > 0)
        <x-sections.hero :banners="$banners" />
    @endif

    <div class="mx-auto max-w-2xl py-10">
        {!! $blocksHtml !!}
    </div>
</x-layout.app>
