<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'code'          =>  'size',
            'name'          =>  'Size',
            'is_required'   =>  1,
        ]);

        // Create a color attribute
        Attribute::create([
            'code'          =>  'color',
            'name'          =>  'Color',
            'is_required'   =>  1,
        ]);
    }
}
