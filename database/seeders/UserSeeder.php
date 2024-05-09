<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array('name' => 'admin akow', 'email' => 'haha@gmail.com', 'email_verified_at' => null, 'password' => '$2y$10$esnTsU6Avkzk97bsYmDYc.Z0MDzXArVJZ9.gIV2UpqVwTL5ZgqSYu', 'remember_token' => null, 'role' => '1', 'is_active' => null, 'status' => '0', 'created_at' => '2022-10-02 14:12:29', 'updated_at' => '2022-10-02 14:12:29'),
            array('name' => 'member aketch', 'email' => 'haha2@gmail.com', 'email_verified_at' => null, 'password' => '$2y$10$SvypBHaNAKW9EG.cMBrcQOYXFAX0mMmA37XS7.AaK7d7KkeRHHXv.', 'remember_token' => null, 'role' => '2', 'is_active' => null, 'status' => '0', 'created_at' => '2022-10-02 14:12:54', 'updated_at' => '2022-10-02 14:12:54'),
            array('name' => 'Customer A. Co', 'email' => 'customer@gmail.com', 'email_verified_at' => null, 'password' => '$2y$10$x/N63jwUYDukuAEjLQIIwuY/n5r5YekPMqXdMczZjd0FHuRHpK/0O', 'remember_token' => null, 'role' => '0', 'is_active' => null, 'status' => '0', 'created_at' => '2022-10-02 14:19:42', 'updated_at' => '2022-10-02 14:19:42'),
        );

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert($user);
        }
    }
}
