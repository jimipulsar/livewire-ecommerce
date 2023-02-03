<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'ABC123',
            'type' => 'fixed',
            'value' => '10',
        ]);
        Coupon::create([
            'code' => 'DEF456',
            'type' => 'percent',
            'percent_off' => '10',
        ]);
    }
}
