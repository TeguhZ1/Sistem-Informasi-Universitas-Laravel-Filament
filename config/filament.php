<?php



return [
    'path' => 'admin',
    'domain' => null,
    'home_url' => '/',
    'auth' => [
        'guard' => 'web',
    ],
    'middleware' => [
        'base' => ['web'],
        'auth' => [
            'auth',
        ],
    ],
    'pages' => [
        'namespace' => 'App\\Filament\\Pages',
    ],
    'resources' => [
        'namespace' => 'App\\Filament\\Resources',
    ],
    'widgets' => [
        'namespace' => 'App\\Filament\\Widgets',
    ],
];
