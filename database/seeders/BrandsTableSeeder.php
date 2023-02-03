<?php

namespace Database\Seeders;

use App\Models\Brand;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->sentence(1);
            $slug = Str::slug($name);
            Brand::create([
                'name' => $name,
                'slug' => $slug,
            ]);


        }
    }
}
