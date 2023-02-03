<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }

    public function index($lang)
    {
        $tags = Tag::orderBy('updated_at', 'DESC')->paginate(10);

        return view('auth.admin.tags.index')->with([
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::all();
        return view('auth.admin.tags.create', ['tags' => $tags]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store($lang, Request $request)
    {

//        $request->validate([
//            'name' => 'required|unique:tags',
//        ]);

        $tag = new Tag;
        $tag->name = $request->input('name');
        $tag->color = $request->input('color');
        $slug = Str::slug($tag->name);
        $tag->slug = $slug;

        if ($tag->save()) {
            return redirect()->route('tags.index', app()->getLocale())->with(['success' => 'Attributo aggiunta con successo.']);
        }

        return redirect()->route('tags.index', app()->getLocale())->with(['errors' => 'Impossibile aggiungere una categoria.']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Tag $tags
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($lang, $id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('auth.admin.tags.show', app()->getLocale(), ['attribute' => $tag]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tag $tags
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $tag = Tag::find($id);

        $tags = Tag::all();

        return view('auth.admin.tags.edit', [
            'tags' => $tags,
            'tag' => $tag,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tag $tags
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($lang, Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->update([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'slug' => Str::slug($request->input('name')),
        ]);
        $tag->save();

        return redirect()->route('tags.index', app()->getLocale())->with(array('category' => $tag))->with('success', 'Attributo modificata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tag $tags
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($lang, Tag $tag)
    {
        if ($tag->delete()) {
            return redirect()->back()->with(['success' => 'Attributo rimosso con successo.']);
        }

        return redirect()->back()->with(['error' => 'Impossibile eliminare attributo.']);
    }
}
