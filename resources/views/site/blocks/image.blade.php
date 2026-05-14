@php
    $width = $block->input('width') ?? 'full';
    $alignment = $block->input('alignment') ?? 'left';

    $containerClasses = 'my-8 border border-gray-300 rounded-sm overflow-hidden';

    if ($width === 'full') {
        $containerClasses .= ' mx-auto max-w-2xl';
    } else {
        $widthClass = match($width) {
            'half' => 'md:w-1/2',
            'third' => 'md:w-1/3',
            'fourth' => 'md:w-1/4',
            default => 'md:w-1/2',
        };

        $alignmentClass = $alignment === 'right' ? 'md:float-right md:ml-8' : 'md:float-left md:mr-8';

        $containerClasses .= " $widthClass $alignmentClass mb-4";
    }
@endphp

<div class="{{ $containerClasses }}">
    <img src="{{ $block->image('highlight', 'desktop') }}" class="w-full h-auto block"/>
</div>
