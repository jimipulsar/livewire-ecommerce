<?php

namespace Database\Seeders;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new = [

            [

                'title1' => 'Trapani',

                'title2' => 'elettrici',

                'title3' => '49',

                'cover' => 'uploads/slider/slider1.jpg',

            ],

            [

                'title1' => 'Scarpe',

                'title2' => 'antinfortunistiche',

                'title3' => '32',

                'cover' => 'uploads/slider/slider2.jpg',

            ],
            [

                'title1' => 'Arredamento',

                'title2' => 'industriale',

                'title3' => '135',

                'cover' => 'uploads/slider/slider3.jpg',

            ],

        ];


        foreach ($new as $key => $value) {

            Slider::create($value);

        }


    }
}
