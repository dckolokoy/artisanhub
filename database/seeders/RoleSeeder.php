<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolesArray = [
            [
                'id' => 0,
                'name' => 'customer',
                'description' => 'customer'
            ],
            [

                'id' => 1,
                'name' => 'admin',
                'description' => 'admin'
            ],
            [

                'id' => 2,
                'name' => 'member',
                'description' => 'member'
            ]
        ];


        foreach ($rolesArray as $role) {
            DB::table('roles')->updateOrInsert([
                'id' =>  $role['id'],
                'name' =>  $role['name'],
                'description' =>  $role['description']
            ]);
        }
    }
}
