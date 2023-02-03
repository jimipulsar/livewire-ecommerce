<?php

namespace Database\Seeders;

use App\Models\AttributeProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker = Faker::create();
        $this->users = User::all();
        for ($i = 1; $i <= 200; $i++) {
            $title = $faker->sentence(1);
            $slug = Str::slug($title);
            $categories = Category::whereHas('childCategories')->pluck('id');
            $brands = Brand::with('products')->pluck('id');

            $product = Product::create([

                'item_name' => $title,
                'slug' => $slug,
                'user_id' => $this->users[rand(0, count($this->users) - 1)]->id,
                'price' => mt_rand(99, 4999) / 100,
                'item_code' => $faker->numberBetween($min = 1, $max = 4523523),
                'img_01' => $faker->image('public/storage/images', 640, 480, null, false),
//                'cover' => $faker->image('public/storage/images',640,480, null, false),
                'published' => (bool)rand(0, 1),
                'shippable' => (bool)rand(0, 1),
                'quantity' => $faker->numberBetween($min = 1, $max = 45),

            ]);

            $product->categories()->sync($categories->random(mt_rand(1, 2)));
            $product->brands()->sync($brands->random(mt_rand(1, 2)));

        }
    }
}
