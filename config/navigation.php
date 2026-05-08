<?php

return [
    'menu' => [
        [
            'label' => 'Start',
            'url' => '/',
        ],
        [
            'label' => 'Aktuelles',
            'url' => '#',
        ],
        [
            'label' => 'Veranstaltungen',
            'url' => '#',
        ],
        [
            'label' => 'Themen',
            'url' => '#',
            'children' => [
                [
                    'label' => 'Umwelt',
                    'url' => '#',
                ],
                [
                    'label' => 'Kultur',
                    'url' => '#',
                ],
            ]
        ],
        [
            'label' => 'Über uns',
            'url' => '#',
        ],
        [
            'label' => 'Kontakt',
            'url' => '#',
        ],
    ]
];
