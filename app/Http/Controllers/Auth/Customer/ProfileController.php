<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('customerAuth')->except('logout');
    }


    public function index()
    {

        $customer = Auth::guard('customer')->user();

        return view('auth.customer.profile', [
            'customer' => $customer,
        ]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'password' => 'required|nullable|required_with:password_confirmation|string|confirmed',
        ]);

        $data = $request->all();
        $customer = Customer::where('id', Auth::guard('customer')->user()->id)->first();


        if (!empty($data['password'])) {

            $data['password'] = Hash::make($data['password']);

        }

        if (empty($data['email'])) {

            return redirect()->route('profile', app()->getLocale())->with('danger', ' Email mancante');

        }

        $customer->update($data);

        return redirect()->route('profile', app()->getLocale())->with('success', ' Profilo modificato con successo!');
    }
}
