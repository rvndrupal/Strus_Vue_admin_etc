<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */


    'title' => 'Recursos',

    'title_prefix' => 'Recursos - ',

    'title_postfix' => 'Admin',


    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Laravel</b>VUE',

    'logo_mini' => '<b>P</b>OS',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'yellow',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'Sistema de Administración',

        [
            'text' => 'Gráficas',
            'url'  => 'admin/charts',
            'permission'  => 'read-charts',
            'icon' => 'fas fa-chart-line'
        ],

        [
            'text' => 'Admin Usuarios',
            'url'  => 'admin/user',
            'icon' => 'users',
            'permission'  => 'read-user',
            'submenu' => [
                [
                    'text' => 'Listado',
                    'url'  => 'admin/user',
                    'permission'  => 'read-user',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Crear',
                    'url'  => 'admin/user/create',
                    'permission'  => 'create-user',
                    'icon' => 'plus-circle'
                ],

            ],
        ],

        [
            'text' => 'Carnet',
            'url'  => 'admin/usuarios',
            'icon' => 'users',
            'permission'  => 'read-usuarios',
            // 'permission'  => 'read-carnet',
            'submenu' => [
                [
                    'text' => 'ListadoSuper',
                    'url'  => 'admin/usuarios',
                    'permission'  => 'read-usuarios',
                    // 'permission'  => 'read-usuariosSuper',
                    'icon' => 'list'
                ],

                [
                    'text' => 'ListadoAdmin',
                    'url'  => 'admin/usuarios/lista',
                    'permission'  => 'read-usuarios',
                    'permission'  => 'read-usuariosAdmin',
                    'icon' => 'list'
                ],

                [
                    'text' => 'Exportar',
                    'url'  => 'admin/usuarios/index-exportar',
                    'permission'  => 'read-exportar',
                    'icon' => 'list'
                ],



                [
                    'text' => 'Cards',
                    'url'  => 'admin/usuarios/cards',
                    'permission'  => 'read-cards',
                    // 'permission'  => 'read-card',
                    'icon' => 'list'
                ],

                [
                    'text' => 'Crear',
                    'url'  => 'admin/usuarios/create',
                    'permission'  => 'create-usuarios',
                    'icon' => 'plus-circle'
                ],
            ],
        ],



        [
            'text' => 'Roles',
            'url'  => 'admin/role',
            'icon' => 'user-tag',
            'permission'  => 'read-role',
            'submenu' => [
                [
                    'text' => 'Listado',
                    'url'  => 'admin/role',
                    'permission'  => 'read-role',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Crear',
                    'url'  => 'admin/role/create',
                    'permission'  => 'create-role',
                    'icon' => 'plus-circle'
                ],
            ],
        ],

        [
            'text' => 'Permisos',
            'url'  => 'admin/permission',
            'icon' => 'lock',
            'permission'  => 'read-permission',
            'submenu' => [
                [
                    'text' => 'Listado',
                    'url'  => 'admin/permission',
                    'permission'  => 'read-permission',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Crear',
                    'url'  => 'admin/permission/create',
                    'permission'  => 'create-permission',
                    'icon' => 'plus-circle'
                ],
            ],
        ],

        //importar
        [
            'text' => 'Importar',
            'url'  => 'importar',
            'icon' => 'users',
            'permission'  => 'import-sistema',
            'submenu' => [
                [
                    'text' => 'Permisos',
                    'url'  => 'admin/importar/permission',
                    'permission'  => 'import-permission',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Paises',
                    'url'  => 'admin/importar/pais',
                    'permission'  => 'import-paises',
                    'icon' => 'list'
                ],

                [
                    'text' => 'Estado Civil',
                    'url'  => 'admin/importar/estadocivil',
                    'permission'  => 'import-estadocivil',
                    'icon' => 'list'
                ],

                [
                    'text' => 'Carreras',
                    'url'  => 'admin/importar/carreras',
                    'permission'  => 'import-carreras',
                    'icon' => 'list'
                ],

                [
                    'text' => 'Escuelas',
                    'url'  => 'admin/importar/escuelas',
                    'permission'  => 'import-escuelas',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Grados',
                    'url'  => 'admin/importar/grados',
                    'permission'  => 'import-grados',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Títulos',
                    'url'  => 'admin/importar/titulos',
                    'permission'  => 'import-titulos',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Idiomas',
                    'url'  => 'admin/importar/idiomas',
                    'permission'  => 'import-idiomas',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Dirección General',
                    'url'  => 'admin/importar/direccionesgenerales',
                    'permission'  => 'import-direccionesgenerales',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Dirección Area',
                    'url'  => 'admin/importar/direccionesareas',
                    'permission'  => 'import-direccionesareas',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Código',
                    'url'  => 'admin/importar/codigos',
                    'permission'  => 'import-codigos',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Nivel',
                    'url'  => 'admin/importar/niveles',
                    'permission'  => 'import-niveles',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Usuarios',
                    'url'  => 'admin/importar/user',
                    'permission'  => 'import-user',
                    'icon' => 'list'
                ],

            ],
        ],

        //catalogos
        [
            'text' => 'Catálogos',
            'url'  => 'catalagos',
            'icon' => 'users',
            'permission'  => 'catalogos-sistema',
            'submenu' => [

                [
                    'text' => 'Pais',
                    'url'  => 'admin/paises',
                    'icon' => 'users',
                    'permission'  => 'read-paises',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/paises',
                            'permission'  => 'read-paises',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/paises/create',
                            'permission'  => 'create-paises',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],

                [
                    'text' => 'Estado civil',
                    'url'  => 'admin/estadocivil',
                    'icon' => 'users',
                    'permission'  => 'read-estadocivil',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/estadocivil',
                            'permission'  => 'read-estadocivil',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/estadocivil/create',
                            'permission'  => 'create-estadocivil',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],


                [
                    'text' => 'Escuela',
                    'url'  => 'admin/escuelas',
                    'icon' => 'users',
                    'permission'  => 'read-escuelas',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/escuelas',
                            'permission'  => 'read-escuelas',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/escuelas/create',
                            'permission'  => 'create-escuelas',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],

                [
                    'text' => 'Grados',
                    'url'  => 'admin/grados',
                    'icon' => 'users',
                    'permission'  => 'read-grados',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/grados',
                            'permission'  => 'read-grados',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/grados/create',
                            'permission'  => 'create-grados',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],

                [
                    'text' => 'Carreras',
                    'url'  => 'admin/carreras',
                    'icon' => 'users',
                    'permission'  => 'read-carreras',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/carreras',
                            'permission'  => 'read-carreras',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/carreras/create',
                            'permission'  => 'create-carreras',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],

                [
                    'text' => 'Títulos',
                    'url'  => 'admin/titulos',
                    'icon' => 'users',
                    'permission'  => 'read-titulos',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/titulos',
                            'permission'  => 'read-titulos',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/titulos/create',
                            'permission'  => 'create-titulos',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],

                [
                    'text' => 'Idiomas',
                    'url'  => 'admin/idiomas',
                    'icon' => 'users',
                    'permission'  => 'read-idiomas',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/idiomas',
                            'permission'  => 'read-idiomas',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/idiomas/create',
                            'permission'  => 'create-idiomas',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],

                [
                    'text' => 'Dirección General',
                    'url'  => 'admin/direccionesgenerales',
                    'icon' => 'users',
                    'permission'  => 'read-direccionesgenerales',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/direccionesgenerales',
                            'permission'  => 'read-direccionesgenerales',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/direccionesgenerales/create',
                            'permission'  => 'create-direccionesgenerales',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],

                [
                    'text' => 'Dirección por Área',
                    'url'  => 'admin/direccionesareas',
                    'icon' => 'users',
                    'permission'  => 'read-direccionesareas',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/direccionesareas',
                            'permission'  => 'read-direccionesareas',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/direccionesareas/create',
                            'permission'  => 'create-direccionesareas',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],

                [
                    'text' => 'Código Puesto',
                    'url'  => 'admin/codigos',
                    'icon' => 'users',
                    'permission'  => 'read-codigos',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/codigos',
                            'permission'  => 'read-codigos',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/codigos/create',
                            'permission'  => 'create-codigos',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],

                [
                    'text' => 'Nivel',
                    'url'  => 'admin/niveles',
                    'icon' => 'users',
                    'permission'  => 'read-niveles',
                    'submenu' => [
                        [
                            'text' => 'Listado',
                            'url'  => 'admin/niveles',
                            'permission'  => 'read-niveles',
                            'icon' => 'list'
                        ],
                        [
                            'text' => 'Crear',
                            'url'  => 'admin/niveles/create',
                            'permission'  => 'create-niveles',
                            'icon' => 'plus-circle'
                        ],
                    ],
                ],
            ],
        ],

        [
            'text' => 'Laravel_Vue',
            'url'  => 'admin/usuarios',
            'icon' => 'users',
            'permission'  => 'read-clientes',
            // 'permission'  => 'read-carnet',
            'submenu' => [
                [
                    'text' => 'Clientes',
                    'url'  => '/clientes',
                    'permission'  => 'read-clientes',
                    // 'permission'  => 'read-usuariosSuper',
                    'icon' => 'list'
                ],
                [
                    'text' => 'Crear',
                    'url'  => 'admin/clientes/create',
                    'permission'  => 'read-clientes',
                    'icon' => 'plus-circle'
                ],


            ],
        ],




        //Panel de usuarios












        // [
        //     'text' => 'Clientes',
        //     'url'  => 'admin/customers',
        //     'icon' => 'users',
        //     'permission'  => 'read-customers',
        //     'submenu' => [
        //         [
        //             'text' => 'Listado',
        //             'url'  => 'admin/customers',
        //             'permission'  => 'read-customers',
        //             'icon' => 'list'
        //         ],
        //         [
        //             'text' => 'Crear',
        //             'url'  => 'admin/customers/create',
        //             'permission'  => 'create-customers',
        //             'icon' => 'plus-circle'
        //         ],
        //     ],
        // ],
        // [
        //     'text' => 'Métodos de pago',
        //     'url'  => 'admin/payment-methods',
        //     'icon' => 'gem',
        //     'permission'  => 'read-payment-methods',
        //     'submenu' => [
        //         [
        //             'text' => 'Listado',
        //             'url'  => 'admin/payment-methods',
        //             'permission'  => 'read-payment-methods',
        //             'icon' => 'list'
        //         ],
        //         [
        //             'text' => 'Crear',
        //             'url'  => 'admin/payment-methods/create',
        //             'permission'  => 'create-payment-methods',
        //             'icon' => 'plus-circle'
        //         ],
        //     ],
        // ],
        // [
        //     'text' => 'Pedidos',
        //     'url'  => 'admin/orders',
        //     'icon' => 'shopping-basket',
        //     'permission'  => 'read-orders',
        //     'submenu' => [
        //         [
        //             'text' => 'Listado',
        //             'url'  => 'admin/orders',
        //             'permission'  => 'read-orders',
        //             'icon' => 'list'
        //         ],
        //         [
        //             'text' => 'Crear',
        //             'url'  => 'admin/orders/create',
        //             'permission'  => 'create-orders',
        //             'icon' => 'plus-circle'
        //         ],
        //     ],
        // ],
        // [
        //     'text' => 'Productos',
        //     'url'  => 'admin/products',
        //     'icon' => 'boxes',
        //     'permission'  => 'read-products',
        //     'submenu' => [
        //         [
        //             'text' => 'Listado',
        //             'url'  => 'admin/products',
        //             'permission'  => 'read-products',
        //             'icon' => 'list'
        //         ],
        //         [
        //             'text' => 'Crear',
        //             'url'  => 'admin/products/create',
        //             'permission'  => 'create-products',
        //             'icon' => 'plus-circle'
        //         ],
        //     ],
        // ],
        // [
        //     'text' => 'Categorías',
        //     'url'  => 'admin/categories',
        //     'icon' => 'tag',
        //     'permission'  => 'read-categories',
        //     'submenu' => [
        //         [
        //             'text' => 'Listado',
        //             'url'  => 'admin/categories',
        //             'permission'  => 'read-categories',
        //             'icon' => 'list'
        //         ],
        //         [
        //             'text' => 'Crear',
        //             'url'  => 'admin/categories/create',
        //             'permission'  => 'create-categories',
        //             'icon' => 'plus-circle'
        //         ],
        //     ],
        // ],
        // [
        //     'text' => 'Etiquetas',
        //     'url'  => 'admin/tags',
        //     'icon' => 'tags',
        //     'permission'  => 'read-tags',
        //     'submenu' => [
        //         [
        //             'text' => 'Listado',
        //             'url'  => 'admin/tags',
        //             'permission'  => 'read-tags',
        //             'icon' => 'list'
        //         ],
        //         [
        //             'text' => 'Crear',
        //             'url'  => 'admin/tags/create',
        //             'permission'  => 'create-tags',
        //             'icon' => 'plus-circle'
        //         ],
        //     ],
        // ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        \App\Filters\MenuFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
