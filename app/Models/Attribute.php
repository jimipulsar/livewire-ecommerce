<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug','color','frontend_type','is_filterable','is_required'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function values()
    {
        return $this->hasMany(AttributesValue::class);
    }
    public function attributeProduct()
    {
        return $this->hasMany(AttributeProduct::class);
    }

}
