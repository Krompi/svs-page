@props(['label', 'children'])

<div class="relative group">
    <button type="button"
            class="dropdown-toggle flex items-center hover:text-primary transition-colors duration-200"
            aria-expanded="false"
            aria-haspopup="true">
        <span>{{ $label }}</span>
        <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
        </svg>
    </button>

    <div class="hidden absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 overflow-hidden"
         role="menu"
         aria-orientation="vertical">
        <div class="py-1">
            @foreach($children as $child)
                <a href="{{ $child->href }}"
                   target="{{ $child->target }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary transition-colors duration-200"
                   role="menuitem">
                    {{ $child->title }}
                </a>
            @endforeach
        </div>
    </div>
</div>
