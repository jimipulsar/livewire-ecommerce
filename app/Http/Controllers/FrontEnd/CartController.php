<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CartController extends Controller
{

    public function cart($lang)
    {

        return view('pages.cart', [
            'discount' => getNumbers()->get('discount'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'total' => getNumbers()->get('total')
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function addToCart($lang, $id)
    {
        $product = Product::findOrFail($id);

        $cart = getCart();

        if (isset($cart[$id])) {

            if ($cart[$id]['quantity'] < $product->stock_qty) {
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Prodotto aggiunto al carrello!');

            } else {
                return redirect()->back()->with('danger', 'Attenzione! Disponibilità limitata');

            }
        }

        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->item_name,
            "stock_qty" => $product->stock_qty,
            "quantity" => 1,
            "price" => $product->price,
            "Descrizione" => $product->Descrizione,
            "slug" => Str::slug($product->Descrizione),
            "img_01" => $product->img_01
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Prodotto aggiunto al carrello!');
    }

    public function addQuantity($lang, $id)
    {
        $product = Product::findOrFail($id);

        $cart = getCart();

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] < $product->stock_qty) {
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);

                return redirect()->back();

            } else {
                return redirect()->back()->with('danger', 'Attenzione! Disponibilità limitata');

            }
        }


        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->item_name,
            "stock_qty" => $product->stock_qty,
            "quantity" => 1,
            "price" => $product->price,
            "Descrizione" => $product->Descrizione,
            "slug" => Str::slug($product->Descrizione),
            "img_01" => $product->img_01
        ];
        session()->put('cart', $cart);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function removeToCart($lang, $id)
    {
        $cart = getCart();

        //se il prodotto è presente nel carrello ed è maggiore o uguale a 2, lo rimuovo sottraendolo di una quantità
        if ($cart[$id]['quantity'] >= 2) {
            $cart[$id]['quantity']--;
            session()->put('cart', $cart);
        }
        \request()->session()->forget('shipping.zipcode');

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function remove($lang, $id)
    {
        $cart = getCart();
        //se il prodotto è presente nel carrello, lo rimuovo con tutte le quantità presenti
        if ($cart[$id]) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        session()->forget('coupon');
        \request()->session()->forget('shipping.zipcode');

        return redirect()->back()->with('success', "Prodotto rimosso dal carrello!");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return redirect()->route('cart', app()->getLocale())->withErrors('Coupon non valido! Si prega di riprovare.');
        }

        session()->put('coupon', [
            'name' => $coupon->code,
            'percent_off' => $coupon->percent_off,
            'discount' => $coupon->discount(getNumbers()->get('total')),
        ]);

        return redirect()->route('cart', app()->getLocale())->with('success', 'Coupon valido applicato con successo');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy()
    {
        \request()->session()->forget('coupon');

        return redirect()->back()->with('success', 'Coupon rimosso con successo.');
    }

}
