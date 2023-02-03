<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = ['order_id', 'product_id', 'price','quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);

    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }



}
