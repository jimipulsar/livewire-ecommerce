<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = [

            [


                'email' => 'randomuser@github.com',
                'shipping_name' => 'Giovanni',
                'shipping_surname' => 'Rossi',
                'shipping_address' => 'Via Alessandro Manzoni, 34',
                'shipping_phone' => '39358222521',
                'shipping_city' => 'Roma',
                'shipping_province' => 'RM',
                'shipping_company' => 'Zara S.r.l.',
                'shipping_zipcode' => '00118',
                'shipping_country' => 'IT',
                'billing_name' => 'Giovanni',
                'billing_surname' => 'Rossi',
                'billing_address' => 'Via Alessandro Manzoni, 34',
                'billing_phone' => '39358222521',
                'billing_city' => 'Roma',
                'billing_province' => 'RM',
                'billing_zipcode' => '00118',
                'billing_country' => 'IT',
                'password' => bcrypt('123456'),

            ],


        ];


        foreach ($customer as $key => $value) {

            Customer::create($value);

        }
    }
}
