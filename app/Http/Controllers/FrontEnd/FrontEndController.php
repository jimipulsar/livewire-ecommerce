<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{

//    public function index()
//    {
//        $q = \request()->input('q');
//        $products = DB::table('products')->inRandomOrder()->paginate(\request()->get('per_page', 25));
//
//        return view('pages.index', [
//
//            'products' => $products,
//            'q' => $q,
//        ])->with('i', (\request()->input('page', 1) - 1) * 20);
//    }

    public function about()
    {

        $aboutGallery = File::allFiles(public_path('/uploads/about'));

        return view('pages.about', [
            'aboutGallery' => $aboutGallery
        ]);
    }

    public function brands()
    {
        $brands = getBrands();
        return view('pages.brands', [
            'brands' => $brands
        ]);
    }

    public function news()
    {

        return view('pages.news');
    }

    public function show($lang, $id)
    {
        $pagination = 15;
        $product = Product::where('id', $id)->first();
        $categories = Category::with('parentCategory')
            ->whereHas('parentCategory')
            ->get();
        $mainCategory = Category::with('parentCategory')
            ->where('parent_id', '=', null)
            ->get();
        $segment = Request::segment(count(Request::segments()));
        $ucFirst = str_replace('', '', strtolower($segment));
        $products = DB::table('products')->inRandomOrder()->paginate(\request()->get('per_page', 25));
        $attributes = Attribute::all();
        $correlatedFirst = Product::query()

            ->leftJoin('category_product', 'category_product.product_id', '=', 'products.id')

            ->leftJoin('categories', 'categories.id', '=', 'category_product.category_id')

            ->select('products.*', 'categories.*', 'category_product.*')
            ->where([
                ['category_product.product_id', '=', $id],
                ])
            ->first()->toArray();
        $correlated = Product::query()

            ->leftJoin('category_product', 'category_product.product_id', '=', 'products.id')

            ->leftJoin('categories', 'categories.id', '=', 'category_product.category_id')

            ->select('products.*', 'categories.*', 'category_product.*')
            ->where([
                ['category_product.category_id', '=', $correlatedFirst['category_id']],
            ])
            ->get()->take(3);
//        dd($correlated);
//        $correlated = Product::where(function ($q) use ($product) {
//            return $q->where('Categoria', '=', $product->Categoria);
//        })
//            ->where('id', '!=', $product->id)->take(3)->orderBy('created_at', 'DESC')->get();
        if (auth()->guard('customer')->check()) {
            $customerFavourites = Wishlist::where('customer_id', auth()->guard('customer')->user()->id)
                ->where('product_id', $product->id)
                ->first();
            return view('pages.product', [
                'product' => $product,
                'products' => $products,
                'customerFavourites' => $customerFavourites,
                'categories' => $categories,
                'attributes' => $attributes,
                'mainCategory' => $mainCategory,
                'correlated' => $correlated
            ]);

        } else {
            return view('pages.product', [
                'product' => $product,
                'products' => $products,
                'categories' => $categories,
                'attributes' => $attributes,
                'mainCategory' => $mainCategory,
                'correlated' => $correlated
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function shop()
    {
        return view('pages.shop', [
        ])->with('i', (\request()->input('page', 1) - 1) * 20);
    }

    public function mainCategory()
    {
        $pagination = 15;
        $segment = Request::segment(count(Request::segments()));
        $ucFirst = str_replace('', '', strtolower($segment));

        $products = Product::query()->with('categories')
            ->leftJoin('category_product', 'category_product.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'category_product.category_id')
            ->select('products.*','category_product.*', 'categories.*')
            ->where([
                ['categories.slug', '=', $ucFirst],
            ])
            ->paginate($pagination);

        return view('pages.categories', [

            'ucFirst' => $ucFirst,
            'products' => $products
        ]);

    }


}
