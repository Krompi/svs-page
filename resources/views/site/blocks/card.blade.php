@php
    $orientation = $block->input('orientation') ?? 'vertical';
    $alignment = $block->input('alignment') ?? 'left';
    $width = $block->input('width') ?? '1/3';
    $headingLevelInput = $block->input('heading_level') ?? 'h2';
    $link = $block->input('link');
    $title = $block->translatedInput('title');
    $hasImage = $block->hasImage('cover', 'desktop');
    $imageUrl = $hasImage ? $block->image('cover', 'desktop') : null;
    $imageAlt = $hasImage ? $block->imageAltText('cover') : '';

    // Validate heading level
    $headingLevel = in_array($headingLevelInput, ['h2', 'h3', 'h4']) ? $headingLevelInput : 'h2';
    $headingClasses = 'mb-4 text-2xl font-bold tracking-tight text-gray-900';

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

    $containerClasses = "bg-gray-50 border border-gray-200 hover:shadow rounded-sm overflow-hidden flex flex-col my-4 $widthClasses";

    if ($orientation === 'horizontal') {
        $containerClasses = "bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden flex flex-col md:flex-row my-4 w-full";
    }
@endphp

<div class="{{ $containerClasses }}">
    @if($imageUrl)
        <div class="{{ $orientation === 'horizontal' ? 'md:w-1/3' : 'w-full' }}">
            @if($link)
                <a href="{{ $link }}" class="block">
                    <img class="w-full h-auto object-cover aspect-video" src="{{ $imageUrl }}" alt="{{ $imageAlt }}" />
                </a>
            @else
                <img class="w-full h-auto object-cover aspect-video" src="{{ $imageUrl }}" alt="{{ $imageAlt }}" />
            @endif
        </div>
    @endif

    <div class="p-6 flex flex-col {{ $alignmentClasses }} {{ $orientation === 'horizontal' ? 'md:flex-1' : '' }}">
        @if($title)
            @if($link)
                <a href="{{ $link }}">
                    {!! "<{$headingLevel} class=\"{$headingClasses}\">" !!}
                        {{ $title }}
                    {!! "</{$headingLevel}>" !!}
                </a>
            @else
                {!! "<{$headingLevel} class=\"{$headingClasses}\">" !!}
                    {{ $title }}
                {!! "</{$headingLevel}>" !!}
            @endif
        @endif


        <div class="w-full space-y-4">
            {!! $renderData->renderChildren('card_content') !!}
        </div>

    </div>
</div>
