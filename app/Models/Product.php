<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

//    public function scopeSearch($query, $q)
//    {
//        if ($q == null) return $query;
//        return $query
//            ->where('item_name', 'LIKE', "%{$q}%");
//
//    }

//    public function tags()
//    {
//        return $this->morphToMany(Tag::class, 'taggable');
//    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
