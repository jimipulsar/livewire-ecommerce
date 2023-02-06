<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Str;

class CompareController extends Controller
{

    public function compare($lang)
    {
        return view('pages.compare', [
            'products' => getProducts(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function addToCompare($lang, $id)
    {
        $product = Product::findOrFail($id);

        $compare = session()->get('compare');

        if (isset($compare[$id])) {
            if ($compare[$id]['quantity'] > 2) {
                $compare[$id]['quantity']++;
                session()->put('compare', $compare);
            } else {
                return redirect()->back()->with('danger', 'Attenzione! Il prodotto è già presente nella lista di confronto');

            }
        }
        $compare[$id] = [
            "id" => $product->id,
            "name" => $product->item_name,
            "stock_qty" => $product->stock_qty,
            "quantity" => 1,
            "price" => $product->price,
            "description" => $product->long_description,
            "sku" => $product->item_code,
            "category" => $product->Categoria,
            "subcategory" => $product->SottoCategoria,
            "width" => $product->base_width,
            "height" => $product->base_height,
            "depth" => $product->base_depth,
            "weight" => $product->base_weight,
            "slug" => Str::slug($product->item_name),
            "img_01" => $product->img_01,
            "published" => $product->published
        ];

        session()->put('compare', $compare);

        return redirect()->back()->with('success', 'Prodotto aggiunto alla lista di confronto');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function removeCompare($lang, $id)
    {
        $compare = session()->get('compare');
        if ($compare[$id]) {
            unset($compare[$id]);
            session()->put('compare', $compare);
        }
        return redirect()->back()->with('success', "Prodotto rimosso dalla lista di confronto");
    }
}
