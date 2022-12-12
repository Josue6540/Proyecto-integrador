<?php

return [
    'name' => 'Estadias web',
    'manifest' => [
        'name' => env('APP_NAME', 'Estadias web'),
        'short_name' => 'PWA',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#56b36a',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/hdpi.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/xhdpi.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/xxhdpi.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/xxxhdpi.png',
                'purpose' => 'any'
            ],


        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-port-mdpi',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-port-xhdpi.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/hdpi.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
