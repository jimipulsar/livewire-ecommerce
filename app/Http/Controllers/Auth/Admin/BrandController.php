<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandProduct;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth')->except('logout');
    }

    public function index()
    {
        $brands = getBrands();

        if (!$brands) {
            abort(404);
        }

        return view('auth.admin.brands.index', [
            'brands' => $brands
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($lang)
    {
        $brand = Brand::all();
        $productBrand = Product::with('brands')
            ->get();
        return view('auth.admin.brands.create', [
            'brand' => $brand,
            'productBrand' => $productBrand,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store($lang, Request $request)
    {
        $request->validate([
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048',
        ]);

        $brand = new Brand;

        $brand->user_id = auth()->guard('admin')->id();
//        $productBrand = DB::table('products')->where('id', '=', \request()->input('brands.0'))->first();
        $brand->name = \request()->input('name');
        $brand->slug = Str::slug($brand->name);
        $brand->description = \request()->input('description');
        $brand->link = \request()->input('link');

        if (\request()->hasFile('cover')) {
            $image = \request()->file('cover');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('storage/images/');
            $image->move($destinationPath, $name);
            $brand->cover = $name;
        } else {
            $brand->cover = 'default.jpg';
        }
        $brand->save();
        $brand->products()->sync(\request()->input('products', []));

        return redirect()->route('brands.index', app()->getLocale()
        )->with([
            'brand' => $brand
        ])->with('success', 'Marchio creato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($lang, $slug)
    {
        $brand = Brand::where('slug', $slug)->first();

        return view('pages.product', [
            'brand' => $brand,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $brand = Brand::find($id);
        $products = Brand::with('products')
            ->get();
        $productBrand = Product::with('brands')
            ->get();
        return view('auth.admin.brands.edit', [
            'brand' => $brand,
            'productBrand' => $productBrand,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update($lang, $id)
    {

        $brand = Brand::findOrFail($id);
        \request()->validate([
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'

        ]);

        $brand->user_id = auth()->guard('admin')->id();

        $brand->update([
            'name' => \request()->input('name'),
            'description' => \request()->input('description'),
            'link' => \request()->input('link'),
            'slug' => Str::slug(\request()->input('name')),
//            'color' => \request()->input('color', [])

        ]);
        if (\request()->hasFile('cover')) {
            $image = \request()->file('cover');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('storage/images/');
            $image->move($destinationPath, $name);
            $brand->cover = $name;
        }

        $brand->products()->sync(\request()->input('products', []));
        $brand->save();
        return redirect()->route('brands.index', app()->getLocale()
        )->with([
            'brand' => $brand
        ])->with('success', 'Prodotto modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($lang, $id)
    {
        $brand = Brand::findOrFail($id);

        if (!$brand) {
            abort(404);
        }
        $brand->delete();
        return redirect()->route('brands.index', app()->getLocale()
        )->with([
            'brand' => $brand
        ])->with('success', 'Prodotto eliminato con successo!');
    }

    public function remove1($lang, $id)
    {
        $brand = Brand::findOrFail($id);

        if (file_exists(public_path('uploads/products/images/' . $brand->img_01)))
            unlink(public_path('uploads/products/images/' . $brand->img_01));
        File::delete('uploads/products/images/' . $brand->img_01);
        $brand->update([
            'img_01' => null,
        ]);

        return redirect()->route('brands.index', app()->getLocale())->with('success', 'Immagine # 2 eliminata con successo!');
    }

    public function remove2($lang, $id)
    {
        $brand = Brand::findOrFail($id);

        if (file_exists(public_path('uploads/products/images/' . $brand->img_02)))
            unlink(public_path('uploads/products/images/' . $brand->img_02));
        File::delete('uploads/products/images/' . $brand->img_02);
        $brand->update([
            'img_02' => null,
        ]);

        return redirect()->route('brands.index', app()->getLocale())->with('success', 'Immagine # 2 eliminata con successo!');
    }

    public function remove3($lang, $id)
    {
        $brand = Brand::findOrFail($id);

        if (file_exists(public_path('uploads/products/images/' . $brand->img_03))) {
            Storage::delete('uploads/products/images/' . $brand->img_03);

        }
        $brand->update([
            'img_03' => null,
        ]);


        return redirect()->route('brands.index', app()->getLocale())->with('success', 'Immagine # 3 eliminata con successo!');
    }

    public function removeAttachment($lang, $id)
    {
        $brand = Brand::findOrFail($id);

        if (file_exists(storage_path('uploads/' . $brand->attachment)))
            unlink(storage_path('app/public/uploads/' . $brand->attachment));
        File::delete(storage_path('app/public/uploads/' . $brand->attachment));

        $brand->update([
            'attachment' => null,
        ]);

        return redirect()->route('brands.index', app()->getLocale())->with('success', 'Immagine # 2 eliminata con successo!');
    }

    public
    function duplicate($lang, $id)
    {

        $existingOpening = Brand::find($id);
        $brand = $existingOpening->replicate();
        $brand->name = htmlspecialchars($brand->name . Str::random(1));
        $brand->slug = Str::slug($brand->name);
        $brand->save();
        return redirect()->route('brands.index', app()->getLocale()
        )->with([
            'brand' => $brand
        ])->with('success', 'Prodotto duplicato con successo!');
    }

    public function searchBrand($lang)
    {
        $pagination = 10;
        $notifications = DB::table('notifications')->orderBy('created_at', 'DESC')->get();
        $customers = DB::table('customers')->orderBy('created_at', 'DESC')->get();
        $o = trim(\request()->input('o'));
        $query = \request()->all();
        $brands = Brand::query()->where('item_name', 'LIKE', '%' . $o . '%')
            ->orWhere('item_code', 'LIKE', '%' . $o . '%')
            ->paginate($pagination);
        $brands->appends(['search' => $o]);

        if (count($brands) > 0) {
            return view('auth.admin.brands.index')->withDetails($brands)->withQuery($o)->with([
                'o' => $o,
                'query' => $query,
                'customers' => $customers,
                'notifications' => $notifications,
                'items' => $brands,
            ]);
        } else {
            return redirect()->route('brands.index', app()->getLocale())->with('danger', 'Corrispondenza non trovata');
        }
    }
}
