<x-ui.button
    :href="$block->input('link')"
    :variant="$block->input('variant') ?? 'primary'"
    :class="$block->input('display') === 'block' ? 'w-full text-center' : ''"
>
    {{ $block->input('text') }}
</x-ui.button>
