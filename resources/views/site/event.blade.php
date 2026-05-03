<x-layout.app :title="$item->title">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <h1 class="text-3xl font-bold mb-4">{{ $item->title }}</h1>
        <div class="prose max-w-none">
            {{ $item->description }}
        </div>
    </div>
</x-layout.app>
