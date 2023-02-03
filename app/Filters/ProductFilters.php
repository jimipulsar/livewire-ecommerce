<?php

namespace App\Filters;

class ProductFilters
{
    public function apply($query)
    {
        if (request()->filled('price')) {
            list($min, $max) = explode(",", \request()->price);

            $query->where('price', '>=', $min)
                ->where('price', '<=', $max);
        }


        if (request()->filled('category')) {
            $categorySlug = \request()->category;

            $query->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        if (request()->filled('brand')) {
            $brandSlug = \request()->brand;

            $query->whereHas('brand', function ($query) use ($brandSlug) {
                $query->where('slug', $brandSlug);
            });
        }


        return $query->get();
    }
}