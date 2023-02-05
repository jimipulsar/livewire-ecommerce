<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
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
            News::create([
                'name' => $name,
                'slug' => $slug,
            ]);


        }
    }
}
