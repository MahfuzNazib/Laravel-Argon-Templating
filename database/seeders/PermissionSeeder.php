<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'key' => 'user_management',
                'display_name' => 'User Management',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'key' => 'all_user',
                'display_name' => 'All User',
                'module_id' => 1,
            ],
            [
                'id' => 3,
                'key' => 'roles',
                'display_name' => 'Roles',
                'module_id' => 1,
            ],

            // Meal Permission Start
            [
                'id' => 4,
                'key' => 'meal_management',
                'display_name' => 'Meal Management',
                'module_id' => 2,
            ],
            [
                'id' => 5,
                'key' => 'daily_meals',
                'display_name' => 'Daily Meals',
                'module_id' => 2,
            ],
            [
                'id' => 6,
                'key' => 'meal_list',
                'display_name' => 'Meal List',
                'module_id' => 2,
            ],

            // Meal Permission End

            
            // [
            //     'id' => 4,
            //     'key' => 'app_management',
            //     'display_name' => 'App Management',
            //     'module_id' => 2,
            // ],
            // [
            //     'id' => 5,
            //     'key' => 'dm_calculation',
            //     'display_name' => 'DM Calculation',
            //     'module_id' => 2,
            // ],
            // Product Management Permission Start
            // [
            //     'id' => 6,
            //     'key' => 'product_management',
            //     'display_name' => 'Product Management',
            //     'module_id' => 3,
            // ],
            // [
            //     'id' => 7,
            //     'key' => 'add_product',
            //     'display_name' => 'Add Product',
            //     'module_id' => 3,
            // ],
            // Product Managment Permission End
        ]);
    }
}
