<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('customerAuth')->except('logout');
    }

    public function address()
    {

        /**
         * fetching the user model
         **/
        if (auth()->guard('customer')->check()) {
            $customer = Auth::guard('customer')->user();

            return view('auth.customer.address', [
                'customer' => $customer,
            ]);
        } else {
            return redirect()->route('index', app()->getLocale());
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'shipping_name' => 'required',
            'shipping_zipcode' => 'required|regex:/\b\d{5}\b/',
        ]);
        $customer = Customer::where('id', Auth::guard('customer')->user()->id)->first();

        $customer->update([
            'billing_name' => \request()->input('billing_name'),
            'billing_surname' => \request()->input('billing_surname'),
            'billing_company' => \request()->input('billing_company'),
            'billing_vat' => \request()->input('billing_vat'),
            'billing_city' => \request()->input('billing_city'),
            'billing_address' => \request()->input('billing_address'),
            'billing_phone' => \request()->input('billing_phone'),
            'billing_zipcode' => \request()->input('billing_zipcode'),
            'billing_province' => \request()->input('billing_name'),
            'billing_country' => \request()->input('billing_country'),
            'shipping_name' => \request()->input('shipping_name'),
            'shipping_surname' => \request()->input('shipping_surname'),
            'shipping_company' => \request()->input('shipping_company'),
            'shipping_city' => \request()->input('shipping_city'),
            'shipping_address' => \request()->input('shipping_address'),
            'shipping_phone' => \request()->input('shipping_phone'),
            'shipping_zipcode' => \request()->input('shipping_zipcode'),
            'shipping_province' => \request()->input('shipping_province'),
            'shipping_country' => \request()->input('shipping_country'),

        ]);

        /**
         * after everything is done return them pack to /profile/ uri
         **/
        return redirect()->route('address', app()->getLocale())->with('success', ' Profilo modificato con successo!');
    }

    public function destroy($lang, $id)
    {
        $customer = Customer::find(Auth::guard('customer')->user()->id);
//        dd($customer);
//        Auth::logout();
        $customer->delete();

            return redirect()->route('index',)
                ->with('success', 'Il tuo account è stato eliminato');
    }
}
