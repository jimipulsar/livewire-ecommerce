<?php


namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WishlistController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function wishlist()
    {

        if (auth()->guard('customer')->check()) {
            $wishlist = getFavorites();

            return view('auth.customer.wishlist', [
                'wishlist' => $wishlist,
            ]);
        } else {
            return redirect()->route('home', app()->getLocale());

        }
    }

    public function addToWishlist($lang, $id)
    {
        $product = Product::findOrFail($id);

        if (auth()->guard('customer')->check()) {
            $status = Wishlist::where('customer_id', auth()->guard('customer')->user()->id)
                ->where('product_id', $product->id)
                ->first();

            if (isset($status->customer_id) && isset($product->id)) {
                return redirect()->back()->with('danger', 'Il prodotto è già presente tra i Preferiti');
            }
            $wishlist = new Wishlist;

            $wishlist->customer_id = auth()->guard('customer')->user()->id;
            $wishlist->product_id = $product->id;
            session()->forget('wishlist');
            $wishlist->save();

            return redirect()->back()->with('success', 'Prodotto aggiunto ai Preferiti');

        } else {
            $wishSession = session()->get('wishlist');

            if (isset($wishSession[$id])) {

                if ($wishSession[$id]['quantity']) {
                    $wishSession[$id]['quantity']++;
                    session()->put('wishlist', $wishSession);
                    return redirect()->back()->with('success', 'Prodotto aggiunto ai Preferiti');

                } else {
                    return redirect()->back()->with('danger', 'Attenzione! Disponibilità limitata');

                }
            }

            $wishSession[$id] = [
                "id" => $product->id,
                "product_id" => $product->id,
                "quantity" => 1,
            ];
            session()->put('wishlist', $wishSession);

            return redirect()->route('home', app()->getLocale())->with('danger', "Hai bisogno di effettuare l'accesso");
        }
    }


    public function removeWish($lang, $id)
    {
        $product = Product::findOrFail($id);
        $wishSession = session()->get('wishlist');
//        dd($wishSession);
        //se il prodotto è presente nel carrello, lo rimuovo con tutte le quantità presenti

        $wishlist = Wishlist::where('customer_id', auth()->guard('customer')->user()->id)
            ->where('product_id', $product->id)
            ->first();
        if (isset($wishlist)) {
            $wishlist->delete();
        }

        if ($wishSession) {
            unset($wishSession[$id]);
            session()->put('wishlist', $wishSession);
        }
        session()->forget('wishlist');
        return redirect()->back()->with('success', "Prodotto rimosso dai Preferiti");
    }
}
