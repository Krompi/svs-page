@php
    $width = $block->input('width') ?? 'full';
    $alignment = $block->input('alignment') ?? 'left';

    $containerClasses = 'border border-gray-300 rounded-sm overflow-hidden';

    if ($width === 'full') {
        $containerClasses .= ' my-8 mx-auto max-w-2xl';
    } else {
        $widthClass = match($width) {
            'half' => 'md:w-1/2',
            'third' => 'md:w-1/3',
            'fourth' => 'md:w-1/4',
            default => 'md:w-1/2',
        };

        $alignmentClass = $alignment === 'right' ? 'md:float-right md:ml-8' : 'md:float-left md:mr-8';

        $containerClasses .= " $widthClass $alignmentClass my-4";
    }
@endphp

<div class="{{ $containerClasses }}">
    @if($block->input('show_lightbox'))
        <a href="{{ $block->image('highlight', 'original') }}" class="lightbox-item block" data-lightbox="image-{{ $block->id }}">
            <img src="{{ $block->image('highlight', 'desktop') }}" alt="{{ $block->imageAltText('highlight') }}" class="w-full h-auto block"/>
        </a>
    @else
        <img src="{{ $block->image('highlight', 'desktop') }}" alt="{{ $block->imageAltText('highlight') }}" class="w-full h-auto block"/>
    @endif
</div>
