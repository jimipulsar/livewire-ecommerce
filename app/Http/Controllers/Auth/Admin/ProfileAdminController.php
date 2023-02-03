<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth')->except('logout');
    }


    public function index()
    {
        /**
         * fetching the user model
         **/

        $admin = Auth::guard('admin')->user();
        //var_dump($customer);

        return view('auth.admin.profile', [
            'admin' => $admin,
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|nullable|required_with:password_confirmation|string|confirmed',
        ]);

        $dataProfile = $request->all();
        $admin = User::where('id', Auth::guard('admin')->user()->id)->first();

        if (!empty($dataProfile['password'])) {

            $dataProfile['password'] = Hash::make($dataProfile['password']);

        }

        if (empty($dataProfile['email'])) {

            return redirect()->route('profile', app()->getLocale())->with('errors', ' Email mancante');

        }


        if (Auth::guard('admin')->check()) {
            $admin->update($dataProfile);
        }
        /**
         * after everything is done return them pack to /profile/ uri
         **/
        return redirect()->route('profileAdmin', app()->getLocale())->with('success', ' Profilo modificato con successo!');
    }

}
