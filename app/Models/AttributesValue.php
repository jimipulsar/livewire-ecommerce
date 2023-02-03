<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributesValue extends Model
{
    use HasFactory;
    protected $table = 'attributes_value';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug','code','name','frontend_type','is_filterable','is_required'
    ];
    protected $casts = [
        'attribute_id'  =>  'integer',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
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
