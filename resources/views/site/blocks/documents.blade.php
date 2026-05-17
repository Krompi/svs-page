@php
    $title = $block->translatedInput('title');
    $level = $block->input('level') ?? 'h2';
    $files = $block->files('documents');

    if (!function_exists('getFileIcon')) {
        function getFileIcon($filename) {
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            return match($extension) {
                'pdf' => 'fa-file-pdf',
                'doc', 'docx' => 'fa-file-word',
                'xls', 'xlsx' => 'fa-file-excel',
                'ppt', 'pptx' => 'fa-file-powerpoint',
                'zip', 'rar', '7z' => 'fa-file-archive',
                'jpg', 'jpeg', 'png', 'gif', 'svg' => 'fa-file-image',
                default => 'fa-file',
            };
        }
    }

    if (!function_exists('formatBytes')) {
        function formatBytes($bytes, $precision = 2) {
            $units = ['B', 'KB', 'MB', 'GB', 'TB'];
            $bytes = max($bytes, 0);
            $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
            $pow = min($pow, count($units) - 1);
            $bytes /= pow(1024, $pow);
            return round($bytes, $precision) . ' ' . $units[$pow];
        }
    }
@endphp

<div class="my-12">
    @if($title)
        <div class="prose max-w-none mb-4">
            <{{ $level }}>{{ $title }}</{{ $level }}>
        </div>
    @endif

    @if($files->isNotEmpty())
        <ul class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
            @foreach($files as $index => $file)
                @php
                    $fileName = $file->file_name;
                    $fileSize = formatBytes($file->size);
                    $icon = getFileIcon($fileName);
                    $isLast = $loop->last;
                    $isFirst = $loop->first;
                @endphp
                <li class="w-full px-4 py-3 {{ !$isLast ? 'border-b border-gray-200' : '' }} {{ $isFirst ? 'rounded-t-lg' : '' }} {{ $isLast ? 'rounded-b-lg' : '' }} hover:bg-gray-50 transition-colors">
                    <a href="{{ $file->link() }}" target="_blank" class="flex items-center justify-between group">
                        <div class="flex items-center">
                            <i class="fa-solid {{ $icon }} text-primary mr-3 text-lg"></i>
                            <span class="group-hover:text-primary transition-colors">{{ $file->caption ?? $fileName }}</span>
                        </div>
                        <span class="text-xs text-gray-500 font-normal">{{ $fileSize }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
