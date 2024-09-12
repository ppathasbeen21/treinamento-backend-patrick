<?php

return [
    'name' => 'Articles',
    'icon' => 'icon fe-align-center',
    'sort' => 20,
    'default_sort' => [
        '-is_active',
        '-star',
        'sort',
        'name',
    ],
];
