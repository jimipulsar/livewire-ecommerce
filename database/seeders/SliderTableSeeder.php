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
        $this->users = User::all();
        $new = [

            [

                'title1' => 'Trapani',

                'title2' => 'elettrici',

                'title3' => '49',

                'cover' => 'trapano.png',

            ],

            [

                'title1' => 'Scarpe',

                'title2' => 'antinfortunistiche',

                'title3' => '32',

                'cover' => 'scarpe.png',

            ],
            [

                'title1' => 'Arredamento',

                'title2' => 'industriale',

                'title3' => '135',

                'cover' => 'apparecchiature.png',

            ],

        ];


        foreach ($new as $key => $value) {

            Slider::create($value);

        }
//        for ($i=0; $i < 3; $i++) {
//            $new = new Slider;
//            $imageNames = ['trapano.png', 'scarpe.png', 'apparecchiature.png'];
//
//            $new->cover = $imageNames[rand(0, count($imageNames) - 1)];
//            $new->user_id = $this->users[rand(0, count($this->users) - 1)]->id;
//
//            $new->save();
//        }

    }
}
