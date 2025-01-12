<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'user_id' => 1,
                'car_id' => 1,
                'start_date' => Carbon::now()->subDays(8),
                'end_date' => Carbon::now()->subDays(3),
                'note' => 'Order pertama',
                'total_price' => 500000,
                'status' => 'Selesai',
            ],
            [
                'user_id' => 2,
                'car_id' => 2,
                'start_date' => Carbon::now()->subDays(5),
                'end_date' => Carbon::now()->subDays(1),
                'note' => 'Order kedua',
                'total_price' => 750000,
                'status' => 'Selesai',
            ],
            [
                'user_id' => 1,
                'car_id' => 3,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(1),
                'note' => 'Order ketiga',
                'total_price' => 600000,
                'status' => 'Proses',
            ],
        ];

        DB::table('orders')->insert($orders);
    }
}
