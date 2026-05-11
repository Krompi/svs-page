<?php

return [
    'menu' => [
        [
            'label' => 'Aktuelles',
            'route' => 'articles.index',
        ],
        [
            'label' => 'Veranstaltungen',
            'route' => 'events.index',
        ],
        [
            'label' => 'Themen',
            'url' => '#',
            'children' => [
                [
                    'label' => 'Elektrifizierung der Bahn',
                    'url' => '/topics/elektrifizierung-der-bahn',
                ],
                [
                    'label' => 'Autobahn A94',
                    'url' => '/topics/autobahn-a94',
                ],
                [
                    'label' => 'Stadtentwicklung',
                    'url' => '/topics/stadtentwicklung',
                ],
                [
                    'label' => 'Mobilität und Barrierefreiheit',
                    'url' => '/topics/mobilitat-und-barrierefreiheit',
                ],
                [
                    'label' => 'Familie, Kinder und Senioren',
                    'url' => '/topics/familie-kinder-und-senioren',
                ],
            ]
        ],
        [
            'label' => 'Über uns',
            'url' => '#',
            'children' => [
                [
                    'label' => 'Vorstandschaft',
                    'url' => '/ueber-uns/vorstandschaft',
                ],
                [
                    'label' => 'Satzung',
                    'url' => '/ueber-uns/satzung',
                ],
                [
                    'label' => 'Jahresberichte',
                    'url' => '/ueber-uns/jahresberichte',
                ],
                [
                    'label' => 'In Memorian',
                    'url' => '/ueber-uns/in-memorian',
                ],
            ]
        ],
        [
            'label' => 'Kontakt',
            'url' => '/kontakt',
        ],
    ]
];
/*
Beispiel für die Verwendung von Routen-Namen:
[
    'label' => 'Start',
    'route' => 'home',
],
[
    'label' => 'Externer Link',
    'url' => 'https://example.com',
],
*/
