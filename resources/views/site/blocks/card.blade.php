@php
    $orientation = $block->input('orientation') ?? 'vertical';
    $alignment = $block->input('alignment') ?? 'left';
    $width = $block->input('width') ?? '1/3';
    $headingLevelInput = $block->input('heading_level') ?? 'h2';
    $link = $block->input('link');
    $title = $block->translatedInput('title');
    $hasImage = $block->hasImage('cover');

    // Validate heading level
    $headingLevel = in_array($headingLevelInput, ['h2', 'h3', 'h4']) ? $headingLevelInput : 'h2';

    $widthClasses = match($width) {
        '1/2' => 'md:w-1/2',
        '1/3' => 'md:w-1/3',
        '1/4' => 'md:w-1/4',
        default => 'md:w-1/3',
    };

    $alignmentClasses = match($alignment) {
        'center' => 'text-center items-center',
        'right' => 'text-right items-end',
        default => 'text-left items-start',
    };

    $containerClasses = "bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden flex flex-col my-4 $widthClasses";

    if ($orientation === 'horizontal') {
        $containerClasses = "bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden flex flex-col md:flex-row my-4 w-full";
    }
@endphp

<div class="{{ $containerClasses }}">
    @if($hasImage)
        <div class="{{ $orientation === 'horizontal' ? 'md:w-1/3' : 'w-full' }}">
            @if($link)
                <a href="{{ $link }}" class="block">
                    <img class="w-full h-auto object-cover aspect-video" src="{{ $block->image('cover', 'highlight') }}" alt="{{ $block->imageAltText('cover') }}" />
                </a>
            @else
                <img class="w-full h-auto object-cover aspect-video" src="{{ $block->image('cover', 'highlight') }}" alt="{{ $block->imageAltText('cover') }}" />
            @endif
        </div>
    @endif

    <div class="p-6 flex flex-col {{ $alignmentClasses }} {{ $orientation === 'horizontal' ? 'md:flex-1' : '' }}">
        @if($title)
            @if($link)
                <a href="{{ $link }}">
                    <{!! $headingLevel !!} class="mb-4 text-2xl font-bold tracking-tight text-gray-900">
                        {{ $title }}
                    </{!! $headingLevel !!}>
                </a>
            @else
                <{!! $headingLevel !!} class="mb-4 text-2xl font-bold tracking-tight text-gray-900">
                    {{ $title }}
                </{!! $headingLevel !!}>
            @endif
        @endif

        <div class="w-full">
            {!! $block->renderChildrenBlocks('card_content') !!}
        </div>
    </div>
</div>
