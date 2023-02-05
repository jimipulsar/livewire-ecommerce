<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


if (!function_exists('getCart')) {
    function getCart()
    {
        return session()->get('cart');

    }
}

if (!function_exists('getProducts')) {
    function getProducts()
    {
        $paginate = 15;
        return Product::orderBy('updated_at', 'DESC')->paginate($paginate);

    }
}
if (!function_exists('getBrands')) {
    function getBrands()
    {
        $paginate = 8;
        return Brand::orderBy('updated_at', 'DESC')->paginate($paginate);
//        return Product::distinct()->get('item_name', 'Categoria', 'item_code', 'Descrizione', 'img_01', 'img_02', 'stock_qty', 'quantity ', 'Prezzo');

    }
}
if (!function_exists('getRandomProducts')) {
    function getRandomProducts()
    {
        return DB::table('products')->where('published', '=', '1')->inRandomOrder()->paginate(15);

    }
}
if (!function_exists('getQuery')) {
    function getQuery()
    {
        return \request()->input('q');

    }
}
if (!function_exists('getCartCounter')) {
    function getCartCounter()
    {
        return count(Session::get('cart', array()));

    }
}
if (!function_exists('getCompareCounter')) {
    function getCompareCounter()
    {
        return count(Session::get('compare', array()));

    }
}
if (!function_exists('getLatestProducts')) {
    function getLatestProducts()
    {
        return DB::table('products')
            ->where('published', '=', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

    }
}
if (!function_exists('lowHigh')) {

    function lowHigh()
    {
        $pagination = 10;
        return Product::orderBy('price', 'ASC')->paginate($pagination);

    }
}
if (!function_exists('productDetails')) {

    function productDetails($id)
    {
        return Product::query()
            ->leftJoin('category_product', 'category_product.product_id', '=', 'products.id')
            ->leftJoin('categories', 'categories.id', '=', 'category_product.category_id')
            ->select('products.*', 'categories.*', 'category_product.*')
            ->where([
                ['category_product.product_id', '=', $id],
            ])
            ->first()->toArray();
    }
}
if (!function_exists('highLow')) {

    function highLow()
    {
        $pagination = 10;
        return Product::orderBy('price', 'DESC')->paginate($pagination);

    }
}

if (!function_exists('getCategories')) {

    function getCategories()
    {
        return DB::table('categories')->where('parent_id', '=', null)->get();
//        return DB::table('products')->orderBy('Prezzo', 'DESC')->get();
    }
}
if (!function_exists('getSubCategories')) {

    function getSubCategories()
    {
        return DB::table('categories')->where('parent_id', '!=', null)->pluck('name');
//        return Product::distinct()->get('SottoCategoria');
//        return DB::table('products')->orderBy('Prezzo', 'DESC')->get();
    }
}

if (!function_exists('getFavorites')) {

    function getFavorites()
    {
        if (auth()->check())
            return Wishlist::where("customer_id", "=", auth()->guard('customer')->user()->id)->orderby('created_at', 'desc')->get();

    }
}

if (!function_exists('jsonString')) {

    function jsonString()
    {

        $jsonStringEN = file_get_contents(database_path('/store/catEN.json'));
        $dataEN = json_decode($jsonStringEN, true);

        $jsonStringIT = file_get_contents(database_path('/store/catIT.json'));
        $dataIT = json_decode($jsonStringIT, true);

        return collect([
            'dataEN' => $dataEN,
            'dataIT' => $dataIT,
        ]);

    }
}
if (!function_exists('getParcel')) {

    function getParcel()
    {
        $parcels = array(
            array(
                'weight' => 5, // kg
                'height' => 40, // cm
                'length' => 40, // cm
                'width' => 40, // cm
            ));

        return collect([
            'parcels' => $parcels,

        ]);

    }
}

if (!function_exists('getImgDir')) {

    function getImgDir()
    {

        $IMG_01 = '/uploads/products/images_600/';
        $IMG_02 = '/uploads/products/images_tab/';
        $IMG_03 = '/uploads/products/images_300/';
        $Logo = '/uploads/products/loghi_thumb/';
        $PITTO = '/uploads/products/images_ptg/';
        $ICO = '/uploads/products/images_ico/';

        return collect([
            'IMG_01' => $IMG_01,
            'IMG_02' => $IMG_02,
            'IMG_03' => $IMG_03,
            'Logo' => $Logo,
            'PITTO' => $PITTO,
            'ICO' => $ICO,

        ]);

    }
}
if (!function_exists('price')) {

    /**
     * @param $format (product obj|string|decimal)
     * @return string
     */
    function price($format): string
    {
        return number_format(floatval($format->price ?? $format), 2, ',', '');
    }
}
if (!function_exists('priceView')) {

    /**
     * @param $format (product obj|string|decimal)
     * @return string
     */
    function priceView($format): string
    {
        return number_format(floatval($format->price ?? $format), 2, ',', '.');
    }
}
if (!function_exists('getNumbers')) {
    function getNumbers()
    {
        $total = 0;
        $cart = getCart();
        if (isset($cart)) {
            foreach (session()->get('cart') as $details) {
                $sub_total = $details['price'] * $details['quantity'];
                $total += $sub_total;
            }
        }

        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? null;
        $newSubtotal = ($total - $discount);

        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }

        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + 7.00;

        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'code' => $code,
            'total' => $total,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);

    }
}
