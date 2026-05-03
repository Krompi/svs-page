<x-layout.app :title="$item->title">
    <div class="mx-auto max-w-2xl py-10">
        {!! $item->renderBlocks() !!}
    </div>
</x-layout.app>
