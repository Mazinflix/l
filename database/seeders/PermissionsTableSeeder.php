<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_access',
            ],
            [
                'id'    => 18,
                'title' => 'shoe_create',
            ],
            [
                'id'    => 19,
                'title' => 'shoe_edit',
            ],
            [
                'id'    => 20,
                'title' => 'shoe_show',
            ],
            [
                'id'    => 21,
                'title' => 'shoe_delete',
            ],
            [
                'id'    => 22,
                'title' => 'shoe_access',
            ],
            [
                'id'    => 23,
                'title' => 'shoes_option_create',
            ],
            [
                'id'    => 24,
                'title' => 'shoes_option_edit',
            ],
            [
                'id'    => 25,
                'title' => 'shoes_option_show',
            ],
            [
                'id'    => 26,
                'title' => 'shoes_option_delete',
            ],
            [
                'id'    => 27,
                'title' => 'shoes_option_access',
            ],
            [
                'id'    => 28,
                'title' => 'order_create',
            ],
            [
                'id'    => 29,
                'title' => 'order_edit',
            ],
            [
                'id'    => 30,
                'title' => 'order_show',
            ],
            [
                'id'    => 31,
                'title' => 'order_delete',
            ],
            [
                'id'    => 32,
                'title' => 'order_access',
            ],
            [
                'id'    => 33,
                'title' => 'perfume_access',
            ],
            [
                'id'    => 34,
                'title' => 'perfumee_create',
            ],
            [
                'id'    => 35,
                'title' => 'perfumee_edit',
            ],
            [
                'id'    => 36,
                'title' => 'perfumee_show',
            ],
            [
                'id'    => 37,
                'title' => 'perfumee_delete',
            ],
            [
                'id'    => 38,
                'title' => 'perfumee_access',
            ],
            [
                'id'    => 39,
                'title' => 'slipper_create',
            ],
            [
                'id'    => 40,
                'title' => 'slipper_edit',
            ],
            [
                'id'    => 41,
                'title' => 'slipper_show',
            ],
            [
                'id'    => 42,
                'title' => 'slipper_delete',
            ],
            [
                'id'    => 43,
                'title' => 'slipper_access',
            ],
            [
                'id'    => 44,
                'title' => 'slipper_option_create',
            ],
            [
                'id'    => 45,
                'title' => 'slipper_option_edit',
            ],
            [
                'id'    => 46,
                'title' => 'slipper_option_show',
            ],
            [
                'id'    => 47,
                'title' => 'slipper_option_delete',
            ],
            [
                'id'    => 48,
                'title' => 'slipper_option_access',
            ],
            [
                'id'    => 49,
                'title' => 'wearable_create',
            ],
            [
                'id'    => 50,
                'title' => 'wearable_edit',
            ],
            [
                'id'    => 51,
                'title' => 'wearable_show',
            ],
            [
                'id'    => 52,
                'title' => 'wearable_delete',
            ],
            [
                'id'    => 53,
                'title' => 'wearable_access',
            ],
            [
                'id'    => 54,
                'title' => 'wearable_option_create',
            ],
            [
                'id'    => 55,
                'title' => 'wearable_option_edit',
            ],
            [
                'id'    => 56,
                'title' => 'wearable_option_show',
            ],
            [
                'id'    => 57,
                'title' => 'wearable_option_delete',
            ],
            [
                'id'    => 58,
                'title' => 'wearable_option_access',
            ],
            [
                'id'    => 59,
                'title' => 'customer_create',
            ],
            [
                'id'    => 60,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 61,
                'title' => 'customer_show',
            ],
            [
                'id'    => 62,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 63,
                'title' => 'customer_access',
            ],
            [
                'id'    => 64,
                'title' => 'wearable_order_create',
            ],
            [
                'id'    => 65,
                'title' => 'wearable_order_edit',
            ],
            [
                'id'    => 66,
                'title' => 'wearable_order_show',
            ],
            [
                'id'    => 67,
                'title' => 'wearable_order_delete',
            ],
            [
                'id'    => 68,
                'title' => 'wearable_order_access',
            ],
            [
                'id'    => 69,
                'title' => 'slipper_order_create',
            ],
            [
                'id'    => 70,
                'title' => 'slipper_order_edit',
            ],
            [
                'id'    => 71,
                'title' => 'slipper_order_show',
            ],
            [
                'id'    => 72,
                'title' => 'slipper_order_delete',
            ],
            [
                'id'    => 73,
                'title' => 'slipper_order_access',
            ],
            [
                'id'    => 74,
                'title' => 'perfume_order_create',
            ],
            [
                'id'    => 75,
                'title' => 'perfume_order_edit',
            ],
            [
                'id'    => 76,
                'title' => 'perfume_order_show',
            ],
            [
                'id'    => 77,
                'title' => 'perfume_order_delete',
            ],
            [
                'id'    => 78,
                'title' => 'perfume_order_access',
            ],
            [
                'id'    => 79,
                'title' => 'wallet_create',
            ],
            [
                'id'    => 80,
                'title' => 'wallet_edit',
            ],
            [
                'id'    => 81,
                'title' => 'wallet_show',
            ],
            [
                'id'    => 82,
                'title' => 'wallet_delete',
            ],
            [
                'id'    => 83,
                'title' => 'wallet_access',
            ],
            [
                'id'    => 84,
                'title' => 'wallet_order_create',
            ],
            [
                'id'    => 85,
                'title' => 'wallet_order_edit',
            ],
            [
                'id'    => 86,
                'title' => 'wallet_order_show',
            ],
            [
                'id'    => 87,
                'title' => 'wallet_order_delete',
            ],
            [
                'id'    => 88,
                'title' => 'wallet_order_access',
            ],
            [
                'id'    => 89,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
