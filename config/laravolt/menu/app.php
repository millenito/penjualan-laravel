
<?php

return [
    'System' => [
        'order' => 99,
        'menu' => [
            // 'Users' => [
            //     'route' => 'epicentrum::users.index',
            //     'active' => 'epicentrum/users/*',
            //     'icon' => 'user-friends',
            //     'permissions' => [\Laravolt\Platform\Enums\Permission::MANAGE_USER],
            // ],
            // 'Settings' => [
            //     'route' => 'platform::settings.edit',
            //     'active' => 'platform/settings/*',
            //     'icon' => 'sliders-v',
            //     'permissions' => [\Laravolt\Platform\Enums\Permission::MANAGE_SETTINGS],
            // ],
            'Produk' => [
                'route' => 'products',
            ],
            'Keranjang' => [
                'route' => 'cart.list',
            ],
            'Laporan' => [
                'route' => 'report',
            ]
        ],
    ],
];
