@php
    $menuLinks = \App\Models\MenuLink::published()->whereNull('parent_id')->orderBy('position')->get();
@endphp

<header class="bg-white shadow-sm relative z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo and Site Name -->
        <div class="font-bold text-xl text-primary">
            <a href="/" class="flex items-center space-x-2">
                <!-- Demo SVG Logo -->
                <svg class="w-8 h-8 text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Stadtverein</span>
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex space-x-8 text-sm font-medium">
            @foreach($menuLinks as $item)
                @php
                    $children = $item->children()->published()->orderBy('position')->get();
                @endphp
                @if($children->isNotEmpty())
                    <x-ui.dropdown :label="$item->title" :children="$children" />
                @else
                    <a href="{{ $item->href }}" target="{{ $item->target }}" class="hover:text-primary transition-colors duration-200">
                        {{ $item->title }}
                    </a>
                @endif
            @endforeach
        </nav>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button type="button" id="mobile-menu-button" class="text-gray-500 hover:text-primary focus:outline-none" aria-expanded="false">
                <span class="sr-only">Menü öffnen</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
        <nav class="px-6 py-4 space-y-4">
            @foreach($menuLinks as $item)
                @php
                    $children = $item->children()->published()->orderBy('position')->get();
                @endphp
                @if($children->isNotEmpty())
                    <div class="space-y-2">
                        <button type="button" class="dropdown-toggle w-full flex justify-between items-center text-left font-medium hover:text-primary" aria-expanded="false">
                            <span>{{ $item->title }}</span>
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div class="hidden pl-4 space-y-2 border-l-2 border-gray-100">
                            @foreach($children as $child)
                                <a href="{{ $child->href }}" target="{{ $child->target }}" class="block text-sm text-gray-600 hover:text-primary">
                                    {{ $child->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $item->href }}" target="{{ $item->target }}" class="block font-medium hover:text-primary transition-colors duration-200">
                        {{ $item->title }}
                    </a>
                @endif
            @endforeach
        </nav>
    </div>
</header>
