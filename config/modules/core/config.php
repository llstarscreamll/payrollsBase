<?php

return [
    'name' => 'Core Module',

    // el tema que usará el módulo Core y todos los demás módulos
    'theme' => env('APP_THEME', 'Bootstrap'),

    // los temas disponibles para usar
    'available-themes' => ['Inspinia', 'Limitless', 'AdminLTE', 'Bootstrap'],

    // aquí mapeamos los archivos importantes de los temas, las dependencias
    // importantes como Jquery y Bootstrap son cargadas en los ficheros app.js
    // y app.css gracias a la tarea del Gulp que tiene por defecto Laravel, así
    // que sólo copiaremos los archivos css y js del tema a la carpeta
    // "/resources/assets/" para que sean minificados con las dependencias básicas
    'themes-files-map' => [
        'Inspinia' => [
            'js' => 'js/inspinia.js',
            'css' => 'css/style.css',
            'app-js' => 'app.js',
            'app-scss' => 'app.scss',
            'folders' => [
                'css/patterns' => 'css/patterns'
            ]
        ],
        'Limitless' => [
            'js' => 'assets/js/core/app.js',
            'css' => 'assets/css/style.css',
            'app-js' => 'app.js',
            'app-scss' => 'app.scss',
            'folders' => []
        ],
        'AdminLTE' => [
            'js' => 'js/app.min.js',
            'css' => 'css/AdminLTE.min.css',
            'app-js' => 'app.js',
            'app-scss' => 'app.scss',
            'folders' => []
        ],
        'Bootstrap' => [
            'js' => 'js/app.js',
            'css' => 'css/app.css',
            'app-js' => 'app.js',
            'app-scss' => 'app.scss',
            'folders' => []
        ],
    ],
];
