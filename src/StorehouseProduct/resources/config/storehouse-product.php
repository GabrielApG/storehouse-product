<?php

return [

    /*
     * Default prefix to the storehouse product.
     */
    'route_prefix' => 'storehouse/product',

    /*
     * Supplier
     */
    'supplier'     => [
        'lengthKey'     => '20',
        'model'         => 'app\Person\Models\Person',
        'primaryKey'    => 'id',
        'route'         => 'person/supplier/search?name=',
        'table'         => 'person',
        'typeKey'       => 'bigInteger',
    ],

    /*
     * Default url used to redirect user to front/admin of your the system.
     */
    'system_url'   => '/',

    /*
     * Default layout extends
     */
    'layout'       => [
    //        'view'    => 'app',
    //        'section' => 'content',
            'view'    => 'storehouse-product::master',
            'section' => 'content',
    ],

    /*
     * Default permission user should have to access the dashboard.
     */
    'security'     => [
        'protected'  => false,
        'middleware' => ['auth'],
        'defender'   =>   [
            'load'       =>  false,
            'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
            'can'        =>  [
                        'storehouse.product.create',
                        'storehouse.product.store',
                        'storehouse.product.search',
                        'storehouse.product.show',
                        'storehouse.product.update',
                        'storehouse.product.destroy',
                    ],
            'any'        =>  false,
            'is'         =>  null,
        ],
        'create'     =>   [
            'protected'  =>  false,
            'middleware' =>  ['auth'],
            'defender'   =>   [
                'load'       =>  false,
                'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                'can'        =>  ['storehouse.product.create','storehouse.product.store'],
                'any'        =>  false,
                'is'         =>  null,
            ],
        ],
        'store'      =>   [
            'protected'  =>  false,
            'middleware' =>  [],
            'defender'   =>   [
                'load'       =>  false,
                'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                'can'        =>  ['storehouse.product.store'],
                'any'        =>  false,
                'is'         =>  null,
            ],
        ],
        'search'     =>   [
            'protected'  =>  false,
            'middleware' =>  [],
            'defender'   =>   [
                'load'       =>  false,
                'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                'can'        =>  ['storehouse.product.search'],
                'any'        =>  false,
                'is'         =>  null,
            ],
        ],
        'show'       =>   [
            'protected'  =>  false,
            'middleware' =>  [],
            'defender'   =>   [
                'load'       =>  false,
                'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                'can'        =>  ['storehouse.product.show'],
                'any'        =>  false,
                'is'         =>  null,
            ],
        ],
        'update'     =>   [
            'protected'  =>  false,
            'middleware' =>  [],
            'defender'   =>   [
                'load'       =>  false,
                'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                'can'        =>  ['storehouse.product.update'],
                'any'        =>  false,
                'is'         =>  null,
            ],
        ],
        'destroy'    =>   [
            'protected'  =>  false,
            'middleware' =>  [],
            'defender'   =>   [
                'load'       =>  false,
                'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                'can'        =>  ['storehouse.product.destroy'],
                'any'        =>  false,
                'is'         =>  null,
            ],
        ],
        'api'    =>   [
            'protected'  => false,
            'middleware' => ['auth'],
            'defender'   =>   [
                'load'       =>  false,
                'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                'can'        =>  [
                            'storehouse.product.create',
                            'storehouse.product.store',
                            'storehouse.product.search',
                            'storehouse.product.show',
                            'storehouse.product.update',
                            'storehouse.product.destroy',
                        ],
                'any'        =>  false,
                'is'         =>  null,
            ],
         ],
        'category'     => [
            'protected'  => false,
            'middleware' => ['auth'],
            'defender'   =>   [
                'load'       =>  false,
                'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                'can'        =>  [
                            'storehouse.product.category.create',
                            'storehouse.product.category.store',
                            'storehouse.product.category.search',
                            'storehouse.product.category.show',
                            'storehouse.product.category.update',
                            'storehouse.product.category.destroy',
                        ],
                'any'        =>  false,
                'is'         =>  null,
            ],
            'create'     =>   [
                'protected'  =>  false,
                'middleware' =>  ['auth'],
                'defender'   =>   [
                    'load'       =>  false,
                    'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                    'can'        =>  ['storehouse.product.category.create','storehouse.product.category.store'],
                    'any'        =>  false,
                    'is'         =>  null,
                ],
            ],
            'store'      =>   [
                'protected'  =>  false,
                'middleware' =>  [],
                'defender'   =>   [
                    'load'       =>  false,
                    'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                    'can'        =>  ['storehouse.product.category.store'],
                    'any'        =>  false,
                    'is'         =>  null,
                ],
            ],
            'search'     =>   [
                'protected'  =>  false,
                'middleware' =>  [],
                'defender'   =>   [
                    'load'       =>  false,
                    'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                    'can'        =>  ['storehouse.product.category.search'],
                    'any'        =>  false,
                    'is'         =>  null,
                ],
            ],
            'show'       =>   [
                'protected'  =>  false,
                'middleware' =>  [],
                'defender'   =>   [
                    'load'       =>  false,
                    'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                    'can'        =>  ['storehouse.product.category.show'],
                    'any'        =>  false,
                    'is'         =>  null,
                ],
            ],
            'update'     =>   [
                'protected'  =>  false,
                'middleware' =>  [],
                'defender'   =>   [
                    'load'       =>  false,
                    'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                    'can'        =>  ['storehouse.product.category.update'],
                    'any'        =>  false,
                    'is'         =>  null,
                ],
            ],
            'destroy'    =>   [
                'protected'  =>  false,
                'middleware' =>  [],
                'defender'   =>   [
                    'load'       =>  false,
                    'middleware' =>  ['needsPermission'], //Use needsPermission or needsRoles
                    'can'        =>  ['storehouse.product.category.destroy'],
                    'any'        =>  false,
                    'is'         =>  null,
                ],
            ],
        ],
    ],
];
