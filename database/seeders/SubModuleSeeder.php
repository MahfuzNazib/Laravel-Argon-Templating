<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_modules')->insert([


            //module id 1 start
            [
                'id' => 1,
                'name' => 'All User',
                'key' => 'all_user',
                'position' => 1,
                'route' => 'user.all',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Roles',
                'key' => 'roles',
                'position' => 2,
                'route' => 'role.all',
                'module_id' => 1,
            ],
            //module id 1 end
            
            // Meal Module Start
            [
                'id' => 3,
                'name' => 'Daily Meals',
                'key' => 'daily_meals',
                'position' => 1,
                'route' => 'meal.add',
                'module_id' => 2,
            ],
            [
                'id' => 4,
                'name' => 'Meal List',
                'key' => 'meal_list',
                'position' => 2,
                'route' => 'meal.list',
                'module_id' => 2,
            ],
            // Meal Module End

            //module id 2 start
            // [
            //     'id' => 3,
            //     'name' => 'DM Calculation',
            //     'key' => 'dm_calculation',
            //     'position' => 1,
            //     'route' => 'role.all',
            //     'module_id' => 2,
            // ],
            //module id 2 end

            // Product Module Start
            // [
            //     'id' => 4,
            //     'name' => 'Product List',
            //     'key' => 'product_list',
            //     'position' => 1,
            //     'route' => 'product.index',
            //     'module_id' => 3
            // ],
            // [
            //     'id' => 5,
            //     'name' => 'Add Product',
            //     'key' => 'add_product',
            //     'position' => 2,
            //     'route' => 'product.add',
            //     'module_id' => 3
            // ],
            // Product Module End

        ]);
    }
}
