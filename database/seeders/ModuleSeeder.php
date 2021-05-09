<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'id' => 1,
                'name' => 'User Management',
                'key' => 'user_management',
                'icon' => 'verified_user',
                'position' => 1,
                'route' => null,
            ],
            [
                'id' => 2,
                'name' => 'Apps Management',
                'key' => 'app_management',
                'icon' => 'perm_phone_msg',
                'position' => 2,
                'route' => null,
            ],
            [
                'id' => 3,
                'name' => 'Product Management',
                'key' => 'product_management',
                'icon' => 'perm_phone_msg',
                'position' => 3,
                'route' => null,
            ],
        ]);
    }
}