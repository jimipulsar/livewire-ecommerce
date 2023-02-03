<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $coupons = Coupon::orderBy('created_at', 'DESC')->paginate(5);
            if (!$coupons) {
                abort(404);
            }
            return view('auth.admin.coupon.index', ['coupons' => $coupons]);
        } else {
            return redirect()->route('index', app()->getLocale());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('auth.admin.coupon.edit', ['coupon' => $coupon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update($lang,Request $request, $id)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        $coupon = Coupon::findOrFail($id);

        $coupon->update([
            'code' => $request->input('code'),
            'value' => $request->input('value'),
            'percent_off' => $request->input('percent_off'),
        ]);
        return redirect()->route('coupon.index', app()->getLocale())->with('success', 'Coupon modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        if (auth()->guard('admin')->user()) {
//            Coupon::find($id)->delete();
//
//            return redirect()->route('coupon.index')
//                ->with('success', 'Coupon eliminato con successo');
//        } else {
//            abort(404);
//        }
    }
}
