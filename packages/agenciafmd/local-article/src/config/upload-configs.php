<?php

return [
    'article' => [
        'image' => [
            'label' => 'imagem', //label do campo
            'multiple' => false, //se permite o upload multiplo
            'faker_dir' => false, #database_path('faker/article/image'),
            'sources' => [
                [
                    'conversion' => 'min-width-1400',
                    'media' => '(min-width: 1400px)',
                    'width' => 2048,
                    'height' => 1152,
                    'optimize' => ((env('APP_ENV') === 'local') || (env('APP_ENV') === 'testing')) ? false : true,
                    'quality' => ((env('APP_ENV') === 'local') || (env('APP_ENV') === 'testing')) ? 75 : 100,
                ],
                [
                    'conversion' => 'min-width-768',
                    'media' => '(min-width: 768px)',
                    'width' => 1024,
                    'height' => 576,
                    'optimize' => ((env('APP_ENV') === 'local') || (env('APP_ENV') === 'testing')) ? false : true,
                    'quality' => ((env('APP_ENV') === 'local') || (env('APP_ENV') === 'testing')) ? 75 : 100,
                ],
                [
                    'conversion' => 'min-width-1',
                    'media' => '(min-width: 1px)',
                    'width' => 512,
                    'height' => 288,
                    'optimize' => ((env('APP_ENV') === 'local') || (env('APP_ENV') === 'testing')) ? false : true,
                    'quality' => ((env('APP_ENV') === 'local') || (env('APP_ENV') === 'testing')) ? 75 : 100,
                ],
            ],
        ],
    ],
];
