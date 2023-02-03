<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [

                'name' => 'Admin',

                'email' => 'admin@livewire-ecommerce.com',

                'address' => 'Station Street',

                'password' => bcrypt('123456'),

            ],

        ];


        foreach ($user as $key => $value) {

            User::create($value);

        }
    }
}
