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
        'endpoint_type' => env('MEDIA_LIBRARY_ENDPOINT_TYPE', 's3'),
        'disk'          => 'public',
        'acl'           => env('MEDIA_LIBRARY_ACL', 'public-read'),
    ],

    'file_library' => [
        'endpoint_type' => env('FILE_LIBRARY_ENDPOINT_TYPE', 's3'),
        'disk'          => 'public',
        'acl'           => env('FILE_LIBRARY_ACL', 'public-read'),
    ],

    'glide' => [
        'use_source_disk'     => true,
        'source_disk'         => 'public',
        'use_cache_disk'      => true,
        'cache_disk'          => env('GLIDE_CACHE_DISK', 'public'),
        'cache_path_prefix'   => env('GLIDE_CACHE_PATH_PREFIX', '.glide-cache'),
        'source_path_prefix'  => env('GLIDE_SOURCE_PATH_PREFIX', 'uploads'),
        'base_url'            => env('GLIDE_BASE_URL', null),
        'use_signed_urls'     => env('GLIDE_USE_SIGNED_URLS', false),
    ],
];
