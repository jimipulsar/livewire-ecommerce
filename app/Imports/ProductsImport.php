<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Product([

            'item_name' => $row[0],
            'Categoria' => $row[1],
            'SottoCategoria' => $row[2],
            'item_code' => $row[3],
            'short_description' => $row[4],
            'long_description' => $row[5],
            'img_01' =>  $row[6] ?? 'default.jpg',
            'img_02' =>  $row[7],
            'img_03' =>  $row[8],
            'base_width' =>  $row[9],
            'base_height' =>  $row[10],
            'base_depth' =>  $row[11],
            'base_weight' =>  $row[12],
            'price' =>  mt_rand(99, 4999) / 100,
            'published' =>  '1',
            'quantity' => '1',
            'stock_qty' => '10',
            'slug' => Str::slug($row[0]),
        ]);

    }
}
