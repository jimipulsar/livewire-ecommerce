<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }

    public function index($lang)
    {
        $attributes = Attribute::orderBy('updated_at', 'DESC')->paginate(10);

        return view('auth.admin.attributes.index')->with([
            'attributes' => $attributes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        $attributes = Attribute::all();
        return view('auth.admin.attributes.create', ['attributes' => $attributes]);

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
        $attribute->color = $request->input('color');
        $slug = Str::slug($attribute->name);
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

        $attributes = Attribute::all();

        return view('auth.admin.attributes.edit', [
            'attributes' => $attributes,
            'attribute' => $attribute,

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
            'color' => $request->input('color'),
            'slug' => Str::slug($request->input('name')),
        ]);
        $attribute->save();

        return redirect()->route('attributes.index', app()->getLocale())->with(array('category' => $attribute))->with('success', 'Attributo modificata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Attribute $attributes
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($lang, Attribute $attribute)
    {
        if ($attribute->delete()) {
            return redirect()->back()->with(['success' => 'Attributo rimosso con successo.']);
        }

        return redirect()->back()->with(['error' => 'Impossibile eliminare attributo.']);
    }
}
