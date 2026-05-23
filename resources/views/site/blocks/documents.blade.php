@php
    $title = $block->translatedInput('title');
    $level = $block->input('level') ?? 'h2';
    // Lade nur die Dateien mit der Rolle "documents" über das Pivot-Feld
    $files = $block->files()->wherePivot('role', 'documents')->get();

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

    if (!function_exists('getFileUrl')) {
        function getFileUrl($file) {
            if (is_object($file) && method_exists($file, 'link')) {
                return $file->link();
            }

            if (is_object($file) && isset($file->uuid)) {
                return \A17\Twill\Services\FileLibrary\FileService::getUrl($file->uuid);
            }

            return '#';
        }
    }

    if (!function_exists('formatBytes')) {
        function formatBytes($bytes, $precision = 2) {
            if (!is_numeric($bytes)) {
                return trim((string) $bytes ?: '0 B');
            }

            $units = ['B', 'KB', 'MB', 'GB', 'TB'];
            $bytes = max((float) $bytes, 0);
            $pow = $bytes > 0 ? (int) floor(log($bytes, 1024)) : 0;
            $pow = max(0, min($pow, count($units) - 1));
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
                    $fileName = $file->filename;
                    $fileSize = formatBytes($file->getAttributes()['size'] ?? $file->size);
                    $icon = getFileIcon($fileName);
                    $isLast = $loop->last;
                    $isFirst = $loop->first;
                @endphp
                <li class="w-full px-4 py-3 {{ !$isLast ? 'border-b border-gray-200' : '' }} {{ $isFirst ? 'rounded-t-lg' : '' }} {{ $isLast ? 'rounded-b-lg' : '' }} hover:bg-gray-50 transition-colors">
                    <a href="{{ getFileUrl($file) }}" target="_blank" class="flex items-center justify-between group">
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
