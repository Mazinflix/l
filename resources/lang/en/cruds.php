<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'product' => [
        'title'          => '????????????????',
        'title_singular' => '????????????????',
    ],
    'shoe' => [
        'title'          => '??????????????',
        'title_singular' => '??????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => '?????? ????????????',
            'name_helper'       => ' ',
            'country'           => '???????? ??????????',
            'country_helper'    => ' ',
            'type'              => '??????????',
            'type_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'shoesOption' => [
        'title'          => '???????? ??????????????',
        'title_singular' => '???????? ??????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'shoe'              => 'Shoe',
            'shoe_helper'       => ' ',
            'option'            => 'Option',
            'option_helper'     => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'gender'            => '??????????????',
            'gender_helper'     => ' ',
            'image'             => '????????????',
            'image_helper'      => ' ',
        ],
    ],
    'order' => [
        'title'          => '?????????? ??????????????',
        'title_singular' => '?????????? ??????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'shoe'              => 'Shoe',
            'shoe_helper'       => ' ',
            'option'            => 'Options',
            'option_helper'     => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'name'              => '????????????',
            'name_helper'       => ' ',
        ],
    ],
    'perfume' => [
        'title'          => '????????????',
        'title_singular' => '????????????',
    ],
    'perfumee' => [
        'title'          => '????????????',
        'title_singular' => '????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => '?????? ??????????',
            'name_helper'       => ' ',
            'size'              => '??????',
            'size_helper'       => ' ',
            'gender'            => '??????????????',
            'gender_helper'     => ' ',
            'price'             => '??????????',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'image'             => '????????????',
            'image_helper'      => ' ',
        ],
    ],
    'slipper' => [
        'title'          => '??????????',
        'title_singular' => '??????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => '?????? ????????????',
            'name_helper'       => ' ',
            'type'              => '??????????',
            'type_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'slipperOption' => [
        'title'          => '???????? ??????????????',
        'title_singular' => '???????? ??????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'slipper'           => '????????????',
            'slipper_helper'    => ' ',
            'option'            => '??????????????????',
            'option_helper'     => ' ',
            'quantity'          => '????????????',
            'quantity_helper'   => ' ',
            'price'             => '??????????',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'image'             => '????????????',
            'image_helper'      => ' ',
        ],
    ],
    'wearable' => [
        'title'          => '??????????????????',
        'title_singular' => '??????????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => '??????????',
            'name_helper'       => ' ',
            'country'           => '???????? ??????????????',
            'country_helper'    => ' ',
            'type'              => '??????????',
            'type_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'wearableOption' => [
        'title'          => '???????? ??????????????????',
        'title_singular' => '???????? ??????????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'wearable'          => '?????? ????????????',
            'wearable_helper'   => ' ',
            'option'            => '???????? ????????????',
            'option_helper'     => ' ',
            'quantity'          => '???????? ????????????',
            'quantity_helper'   => ' ',
            'price'             => '??????????',
            'price_helper'      => ' ',
            'notes'             => '??????????????',
            'notes_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'image'             => '????????????',
            'image_helper'      => ' ',
        ],
    ],
    'customer' => [
        'title'          => '??????????????',
        'title_singular' => '??????????????',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'address'               => 'Address',
            'address_helper'        => ' ',
            'phone'                 => 'Phone',
            'phone_helper'          => ' ',
            'identification'        => '?????????? ??????????????',
            'identification_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'wearableOrder' => [
        'title'          => '?????????? ??????????????????',
        'title_singular' => '?????????? ??????????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => '????????????',
            'customer_helper'   => ' ',
            'wearable'          => '?????? ????????????',
            'wearable_helper'   => ' ',
            'option'            => '???????? ????????????',
            'option_helper'     => ' ',
            'quantity'          => '????????????',
            'quantity_helper'   => ' ',
            'price'             => '??????????',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'slipperOrder' => [
        'title'          => '?????????? ??????????????',
        'title_singular' => '?????????? ??????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => '????????????',
            'customer_helper'   => ' ',
            'slipper'           => '????????????',
            'slipper_helper'    => ' ',
            'option'            => '???????? ????????????',
            'option_helper'     => ' ',
            'quantity'          => '????????????',
            'quantity_helper'   => ' ',
            'price'             => '??????????',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'perfumeOrder' => [
        'title'          => '?????????? ????????????',
        'title_singular' => '?????????? ????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => '????????????',
            'customer_helper'   => ' ',
            'perfume'           => '??????????',
            'perfume_helper'    => ' ',
            'quantity'          => '????????????',
            'quantity_helper'   => ' ',
            'price'             => '??????????',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'wallet' => [
        'title'          => '??????????',
        'title_singular' => '??????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => '??????????',
            'name_helper'       => ' ',
            'type'              => '??????????',
            'type_helper'       => ' ',
            'quantity'          => '????????????',
            'quantity_helper'   => ' ',
            'price'             => '??????????',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'image'             => '??????????',
            'image_helper'      => ' ',
        ],
    ],
    'walletOrder' => [
        'title'          => '?????????? ??????????????',
        'title_singular' => '?????????? ??????????????',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => '?????? ????????????',
            'customer_helper'   => ' ',
            'wallet'            => '?????? ??????????????',
            'wallet_helper'     => ' ',
            'quantity'          => '????????????',
            'quantity_helper'   => ' ',
            'price'             => '??????????',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
