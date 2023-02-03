<?php

namespace App\Http\Controllers\Auth\Customer;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SubOrder;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('customerAuth')->except('logout');
    }


    public function index($lang)
    {

        if (auth()->guard('customer')->check()) {
            $orders = auth()->guard('customer')->user()->orders()->with('items')->orderBy('created_at', 'DESC')->paginate(6);

            $IMG_01 = '/uploads/products/images_600/';
            if (!$orders) {
                abort(404);
            }
            return view('auth.customer.orders.index', [
                'orders' => $orders,
                'IMG_01' => $IMG_01
            ]);

        } else {
            return redirect()->route('index');
        }
    }


    public function show($lang, $id)
    {

        if (auth()->guard('customer')->check()) {

            $IMG_01 = '/uploads/products/images_600/';
            $order = OrderItem::where('id', $id)->first();
            if (!$order) {
                abort(404);
            }
            $orderInfo = Order::where('id', $id)->first();
            if (!$orderInfo) {
                abort(404);
            }
            $products = $order->items;
            $subOrderInfo = SubOrder::where('id', $id)->first();
//            dd($subOrderInfo->grand_total);
            $tax = config('cart.tax') / 100;

            $newTax = $subOrderInfo->grand_total * $tax;

            return view('auth.customer.orders.show', [
                'IMG_01' => $IMG_01,
                'order' => $order,
                'newTax' => $newTax,
                'orderInfo' => $orderInfo,
                'products' => $products,
            ]);

        } else {
            return redirect()->route('index', app()->getLocale());
        }
    }

}


