<?php

return [
    [
        'name' => config('local-article.name'),
        'policy' => '\Agenciafmd\Article\Policies\ArticlePolicy',
        'abilities' => [
            [
                'name' => 'visualizar',
                'method' => 'view',
            ],
            [
                'name' => 'criar',
                'method' => 'create',
            ],
            [
                'name' => 'atualizar',
                'method' => 'update',
            ],
            [
                'name' => 'deletar',
                'method' => 'delete',
            ],
            [
                'name' => 'restaurar',
                'method' => 'restore',
            ],
        ],
        'sort' => 10,
    ],
];
