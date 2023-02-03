<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected $fillable = [
//        'email', 'name', 'address', 'city', 'customer_id',
//        'province', 'zipcode', 'phone', 'name_on_card', 'discount', 'discount_code', 'subtotal', 'tax', 'total', 'payment_gateway', 'error',
//    ];

    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }



    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function generateSubOrders()
    {

        $orderItems = $this->items;

        foreach ($orderItems->groupBy('order_id') as $products) {

            $suborder = $this->subOrders()->create([
                'order_id' => $this->id,
                'customer_id' => auth()->guard('customer')->user()->id,
                'grand_total' => $products->sum('pivot.price'),
                'item_count' => $products->sum('pivot.quantity'),
            ]);

            foreach ($products as $product) {
                $suborder->items()->attach($product->id, ['price' => $product->pivot->price, 'quantity' => $product->pivot->quantity]);

            }

        }
    }


}
