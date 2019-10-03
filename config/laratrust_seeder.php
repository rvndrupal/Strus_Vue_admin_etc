<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'charts' => 'r',
            'customers' => 'c,r,u,d',
            'payment-methods' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'user' => 'c,r,u,d',
            'role' => 'c,r,u,d',
            'permission' => 'c,r,u,d',
            'usuarios' => 'c,r,d',
            'grados' => 'c,r,u,d',
            'carreras' => 'c,r,u,d',
            'paises' => 'c,r,u,d',
            'escuelas' => 'c,r,u,d',
            'titulos' => 'c,r,u,d',
            'idiomas' => 'c,r,u,d',
            'direccionesgenerales' => 'c,r,u,d',
            'direccionesareas' => 'c,r,u,d',
            'codigos' => 'c,r,u,d',
            'niveles' => 'c,r,u,d',
            'estadocivil' => 'c,r,u,d',

        ],
        'administrator' => [
            'customers' => 'c,r,u',
            'payment-methods' => 'c,r,u',
            'orders' => 'r,u',
            'products' => 'c,r,u',
            'categories' => 'c,r,u',
            'tags' => 'c,r,u',
            'user' => 'c,r,u',
            // 'role' => 'c,r',
            'usuarios' => 'c,r,u,d',
            'grados' => 'c,r,u',
            'carreras' => 'c,r,u',
            'paises' => 'c,r,u',
            'escuelas' => 'c,r,u',
            'titulos' => 'c,r,u',
            'idiomas' => 'c,r,u',
            'direccionesgenerales' => 'c,r,u',
            'direccionesareas' => 'c,r,u',
            'codigos' => 'c,r,u',
            'niveles' => 'c,r,u',
            'estadocivil' => 'c,r,u',



        ],
        // 'normaluser' => [
        //     'customers' => 'r',
        //     'payment-methods' => 'r',
        //     'orders' => 'r',
        //     'products' => 'r',
        //     'categories' => 'r',
        //     'tags' => 'r',
        //     'user' => 'r',
        //     'role' => 'r',
        //     'permission' => 'r',
        //     'usuarios' => 'r',
        //     'grados' => 'r',
        //     'carreras' => 'r',
        //     'paises' => 'r',
        //     'escuelas' => 'r',
        //     'titulos' => 'r',
        //     'idiomas' => 'r',
        //     'direccionesgenerales' => 'r',
        //     'direccionesareas' => 'r',
        //     'codigos' => 'r',
        //     'niveles' => 'r',
        //     'estadocivil' => 'r',


        // ],

        'alta' => [
            'usuarios' => 'c,r,u',
        ],

        'Editar_Alta' => [
            'usuarios' => 'r,u',
        ],

        // 'alta_editar' => [
        //     'usuarios' => 'c,r,u',
        // ],


    ],
    'permission_structure' => [

    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
