<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth');
    }

    public function index()
    {
        $sliders = Slider::all();

        if (!$sliders) {
            abort(404);
        }

        return view('auth.admin.sliders.index', [
            'sliders' => $sliders,
        ]);


    }


    public function create()
    {
        $slide = Slider::all();

        return view('auth.admin.sliders.create', ['slide' => $slide]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store()
    {
        \request()->validate([
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
        ]);

        $data = \request()->all();

        $slide = new Slider;

        $slide->customer_id = auth()->guard('admin')->id();
        $slide->fill($data);

        if (\request()->hasFile('cover')) {
            $image = \request()->file('cover');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/sliders/');
            $image->move($destinationPath, $name);
            $slide->cover = $name;
        }

        $slide->save();

        return redirect()->route('sliders.index')->with('success', 'Slider creata con successo!');
    }


    public function show($lang, $id)
    {
        $slider = Slider::find($id);

        return view('auth.admin.sliders.show', ['slider' => $slider]);

    }

    public function edit($lang, $id)
    {
        $slide = Slider::findOrFail($id);


        return view('auth.admin.sliders.edit', ['slide' => $slide]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update($lang, $id)
    {

        $slide = Slider::find($id);

        \request()->validate([
            'cover' => 'image|mimes:jpeg,png,jpg,svg|max:8048',
        ]);

        $slide->update([
            'title1' => \request()->input('title1'),
            'title2' => \request()->input('title2'),
            'title3' => \request()->input('title3'),
        ]);
        if (\request()->hasFile('cover')) {
            $image = \request()->file('cover');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/sliders/');
            $image->move($destinationPath, $name);
            $slide->cover = $name;

        }

        $slide->save();
        return redirect()->route('sliders.index', app()->getLocale()
        )->with([
            'slide' => $slide
        ])->with('success', 'Slider modificata con successo!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slider::findOrFail($id);
//        dd($slide);
//        dd($slide);
        if (file_exists(public_path('uploads/sliders/' . $slide->cover)))
            unlink(public_path('uploads/sliders/' . $slide->cover));
        File::delete('uploads/sliders/' . $slide->cover);
        if (!$slide) {
            abort(404);
        }
        $slide->delete();
        return redirect()->route('sliders.index')->with('success', 'Slide eliminata con successo');
    }
}
