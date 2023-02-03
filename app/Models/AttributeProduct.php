<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeProduct extends Model
{
    use HasFactory;
    protected $table = 'attribute_product';

    protected $fillable = ['value', 'price'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

//    public function attributeProduct()
//    {
//        return $this->hasMany(AttributeProduct::class);
//    }
//    public function attributesValue()
//    {
//        return $this->hasMany(AttributesValue::class);
//    }

}
