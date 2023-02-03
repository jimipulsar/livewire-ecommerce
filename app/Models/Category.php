<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable  = ['name','parent_id','category_slug', 'user_id'];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    public function parentCategory()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function childCategories()
    {
        return $this->hasMany(self::class,  'parent_id');
    }

}
