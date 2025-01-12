<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Razaqul Tegar',
                'phone' => '081227086541',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'John Doe',
                'phone' => '081234567890',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'Jane Smith',
                'phone' => '081298765432',
                'password' => Hash::make('123456'),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
