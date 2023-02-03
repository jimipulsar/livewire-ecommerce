<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(CustomerTableSeeder::class);


//        Product::factory()->count(100)->create();
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

//        Tag::factory()->count(50)->create();

//        foreach ((range(1,50)) as $index) {
//            Product::find(rand(1,100))->brands()->sync([
//                rand(1, (rand(1,10))),
//                rand(1, (rand(11,20))),
//                rand(1, (rand(21,30))),
//                rand(1, (rand(31,40))),
//                rand(1, (rand(41,50))),
//            ]);
//        };
        $this->call(AttributesTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(CouponTableSeeder::class);
    }
}
