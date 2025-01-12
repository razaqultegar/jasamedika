<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            [
                'user_id' => '1',
                'plate' => 'A 1234 BC',
                'merk' => 'Mitsubishi',
                'model' => 'Xpander',
                'price' => '350000.00',
            ],
            [
                'user_id' => '1',
                'plate' => 'B 5678 CD',
                'merk' => 'Toyota',
                'model' => 'Avanza',
                'price' => '200000.00',
            ],
            [
                'user_id' => '2',
                'plate' => 'D 9101 EF',
                'merk' => 'Honda',
                'model' => 'Civic',
                'price' => '450000.00',
            ],
            [
                'user_id' => '2',
                'plate' => 'E 2345 GH',
                'merk' => 'Suzuki',
                'model' => 'Ertiga',
                'price' => '220000.00',
            ],
            [
                'user_id' => '3',
                'plate' => 'F 6789 IJ',
                'merk' => 'Daihatsu',
                'model' => 'Terios',
                'price' => '300000.00',
            ],
        ];

        DB::table('cars')->insert($cars);
    }
}
