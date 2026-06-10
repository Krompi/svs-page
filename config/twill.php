<?php

return [
    'block_editor' => [
        'use_twill_blocks' => [],
        'files' => [
            'documents',
        ],
        'crops' => [ 
            'highlight' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 16 / 9,
                    ],
                ],
                'desktop' => [
                    [
                        'name' => 'desktop',
                        'ratio' => 16 / 9,
                    ],
                ],
                'original' => [
                    [
                        'name' => 'original',
                        'ratio' => 0,
                    ],
                ],
                'mobile' => [
                    [
                        'name' => 'mobile',
                        'ratio' => 1,
                    ],
                ],
            ],
            'cover' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 16 / 9,
                    ],
                ],
                'desktop' => [
                    [
                        'name' => 'desktop',
                        'ratio' => 16 / 9,
                    ],
                ],
                'original' => [
                    [
                        'name' => 'original',
                        'ratio' => 0,
                    ],
                ],
                'mobile' => [
                    [
                        'name' => 'mobile',
                        'ratio' => 1,
                    ],
                ],
            ],
            'gallery' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 16 / 9,
                    ],
                ],
                'original' => [
                    [
                        'name' => 'original',
                        'ratio' => 0,
                    ],
                ],
            ],
        ],
    ],
    'default_crops' => [
        'cover' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 16 / 9,
                ]
            ]
        ],
        'article_cover' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 16 / 9,
                ]
            ]
        ],
        'event_cover' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 16 / 9,
                ]
            ]
        ],
    ],
    'media_library' => [
        'endpoint_type'       => env('MEDIA_LIBRARY_ENDPOINT_TYPE', 's3'),
        'disk'                => 's3',
        'acl'                 => env('MEDIA_LIBRARY_ACL', 'public-read'),
        #'local_path' => env('MEDIA_LIBRARY_LOCAL_PATH', 'uploads/'),    
    ],
    'file_library' => [
        'endpoint_type' => env('FILE_LIBRARY_ENDPOINT_TYPE', 's3'),
        'disk'          => 's3',
        'acl'           => env('FILE_LIBRARY_ACL', 'public-read'),
    ],
    'glide' => [    
        'source_disk'       => env('GLIDE_SOURCE_DISK', 's3'),
        'cache_disk'        => env('GLIDE_CACHE_DISK', 's3'),
        'cache_path_prefix' => env('GLIDE_CACHE_PATH_PREFIX', '.glide-cache'),
        'source_path_prefix' => env('GLIDE_SOURCE_PATH_PREFIX', 'uploads'), // ← NEU
        'base_url'          => env('GLIDE_BASE_URL', null),
        'use_signed_urls'   => env('GLIDE_USE_SIGNED_URLS', false),
    
    ],
];
