<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth')->except('logout');
    }
    public function index($lang)
    {
        // mostro solo le categorie genitori
        //  $parentcategory = Category::with('children')->whereNull('parent_id')->get();

        $categories = Category::orderBy('updated_at', 'DESC')->paginate(10);

        return view('auth.admin.categories.index')->with([
            'categories'  => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        return view('auth.admin.categories.create', ['categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($lang,Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $category = Category::create($request->all());
        $category->name = $request->name;
        $slug = Str::slug($category->name);
        $category->slug = $slug;
        $category->parent_id = $request->parent_id;

        if ($category->save() ) {
            return redirect()->route('categories.index', app()->getLocale())->with(['success' => 'Categoria aggiunta con successo.']);
        }

        return redirect()->route('categories.index', app()->getLocale())->with(['errors' => 'Impossibile aggiungere una categoria.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($lang, $slug)
    {
        $category = Category::where('category_slug', $slug)->first();
        return view('auth.admin.categories.show', app()->getLocale())->with(array('category' => $category));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $category = Category::find($id);

        $categories = Category::all();

        return view('auth.admin.categories.edit')->with(array('category' => $category))->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($lang, Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->input('name'),
            'category_slug' => Str::slug($request->input('name')),
            'parent_id' => $request->input('parent_id'),
        ]);
        $category->save();

        return redirect()->route('categories.index', app()->getLocale())->with(array('category' => $category))->with('success','Categoria modificata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $categories
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($lang,Category $category)
    {
        if ($category->delete()) {
            return redirect()->back()->with(['success' => 'Categoria rimossa con successo.']);
        }

        return redirect()->back()->with(['error' => 'Impossibile eliminare la categoria.']);
    }
}
