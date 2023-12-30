<?php 
    return [
     
        [
            'label' => 'User',
            'route' => 'admin.user.index',
            'icon' =>'fas fa fa-user-circle',
            'item' =>[
                [
                    'label' => 'Add User',
                    'route' => 'admin.product.create'
                ],
                [
                    'label' => 'List User',
                    'route' => 'admin.user.index'
                ]
            ]
        ],
        [
            'label' => 'Role',
            'route' => 'admin.role.index',
            'icon' =>'fas fa-fw fa-cog',
            'item' =>[
                [
                    'label' => 'Add Role',
                    'route' => 'admin.role.create'
                ],
                [
                    'label' => 'List Role',
                    'route' => 'admin.role.index'
                ]
            ]
        ],
        [
            'label' => 'Product',
            'route' => 'admin.product.index',
            'icon' =>'fas fa-fw fa-folder',
            'item' =>[
                [
                    'label' => 'Add Product',
                    'route' => 'admin.product.create'
                ],
                [
                    'label' => 'List Product',
                    'route' => 'admin.product.index'
                ]
            ]
        ],
        [
            'label' => 'Brand',
            'route' => 'admin.brand.index',
            'icon' =>'fas fa-fw fa-folder',
            'item' =>[
                [
                    'label' => 'Add Brand',
                    'route' => 'admin.brand.create'
                ],
                [
                    'label' => 'List Brand',
                    'route' => 'admin.brand.index'
                ]
            ]
        ],
        [
            'label' => 'Color',
            'route' => 'admin.color.index',
            'icon' =>'fas fa-fw fa-folder',
            'item' =>[
                [
                    'label' => 'Add Color',
                    'route' => 'admin.color.create'
                ],
                
                [
                    'label' => 'List Color',
                    'route' => 'admin.color.index'
                ]
            ]
        ],
        [
            'label' => 'Bill',
            'route' => 'admin.bill.index',
            'icon' =>'fas fa-fw fa-folder',
            'item' =>[
                [
                    'label' => 'Add Bill',
                    'route' => 'admin.bill.create'
                ],
                [
                    'label' => 'List Bill',
                    'route' => 'admin.bill.index'
                ]
            ]
        ],
        

    ]
?>