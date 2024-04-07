<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }

    public function index($lang)
    {
//        $attributes = Attribute::orderBy('updated_at', 'DESC')->paginate(10);

        return view('auth.admin.attributes.index')->with('i', (\request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        $attributes = Attribute::all();
        $productAttribute= Product::with('attributes')
            ->get();
        return view('auth.admin.attributes.create', [
            'attributes' => $attributes,
            'productAttribute' => $productAttribute]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store($lang, Request $request)
    {

//        $request->validate([
//            'name' => 'required|unique:attributes',
//        ]);

        $attribute = new Attribute;
        $attribute->name = $request->input('name');
        $attribute->code = $request->input('code');
        $slug = Str::slug($attribute->name);
        $attribute->parent_id = $request->parent_id;
        $attribute->slug = $slug;

        if ($attribute->save()) {
            return redirect()->route('attributes.index', app()->getLocale())->with(['success' => 'Attributo aggiunta con successo.']);
        }

        return redirect()->route('attributes.index', app()->getLocale())->with(['errors' => 'Impossibile aggiungere una categoria.']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Attribute $attributes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($lang, $id)
    {
        $attribute = Attribute::where('id', $id)->first();
        return view('auth.admin.attributes.show', app()->getLocale(), ['attribute' => $attribute]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Attribute $attributes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $attribute = Attribute::find($id);
        $productAttribute = Product::with('attributes');
        $attributes = getAttributes();

        if (!$attributes) {
            abort(404);
        }


        return view('auth.admin.attributes.edit', [
            'attributes' => $attributes,
            'attribute' => $attribute,
            'productAttribute' => $productAttribute

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Attribute $attributes
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($lang, Request $request, $id)
    {
        $attribute = Attribute::find($id);
        $attribute->update([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'slug' => Str::slug($request->input('name')),
            'parent_id' => $request->input('parent_id'),

        ]);
        $attribute->save();

        return redirect()->route('attributes.index', app()->getLocale())->with(array('attribute' => $attribute))->with('success', 'Attributo modificata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Attribute $attributes
     * @return \Illuminate\Http\RedirectResponse
     */
    function duplicate($lang, $id)
    {

        $existingOpening = Attribute::find($id);
        $attribute = $existingOpening->replicate();
        $attribute->code = htmlspecialchars($attribute->code . Str::random(1));
        $attribute->name = htmlspecialchars($attribute->name . Str::random(1));
        $attribute->slug = Str::slug($attribute->name);
        $attribute->save();
        return redirect()->route('attributes.index', app()->getLocale()
        )->with([
            'attribute' => $attribute
        ])->with('success', 'Attributo duplicato con successo!');
    }
    public function searchAttribute($lang)
    {
        $pagination = 10;
        $notifications = DB::table('notifications')->orderBy('created_at', 'DESC')->get();
        $customers = DB::table('customers')->orderBy('created_at', 'DESC')->get();
        $o = trim(\request()->input('o'));
        $query = \request()->all();
        $attributes = Attribute::query()->where('name', 'LIKE', '%' . $o . '%')
            ->orWhere('code', 'LIKE', '%' . $o . '%')
            ->paginate($pagination);
        $attributes->appends(['search' => $o]);

        if (count($attributes) > 0) {
            return view('auth.admin.attributes.index')->withDetails($attributes)->withQuery($o)->with([
                'o' => $o,
                'query' => $query,
                'customers' => $customers,
                'notifications' => $notifications,
                'items' => $attributes,
            ]);
        } else {
            return redirect()->route('attributes.index', app()->getLocale())->with('danger', 'Corrispondenza non trovata');
        }
    }
    public function destroy($lang, Attribute $attribute)
    {
        if ($attribute->delete()) {
            return redirect()->back()->with(['success' => 'Attributo rimosso con successo.']);
        }

        return redirect()->back()->with(['error' => 'Impossibile eliminare attributo.']);
    }
}
