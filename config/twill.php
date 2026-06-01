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
        'disk' => 's3',
        'acl' => null,
    ]
];
