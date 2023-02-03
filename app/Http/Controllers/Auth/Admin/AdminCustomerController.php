<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth')->except('logout');
    }

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $users = Customer::orderBy('id', 'DESC')->paginate(15);
            $currentNotice = Notification::where('read_at', '=', null)->first();

            if (!empty($currentNotice)) {
//                $currentNotice->read_at = Carbon::now();
//                $currentNotice->save();
                $currentNotice->delete();
            }

            if (!$users) {
                abort(404);
            }
            return view('auth.admin.customers.index', ['users' => $users]);
        } else {
            return redirect()->route('index', app()->getLocale());
        }

    }

    public function create()
    {
        $user = Customer::all();
        if (!$user) {
            abort(404);
        }
        return view('auth.admin.customers.create', ['user' => $user]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required']);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);
        $input['ip_address'] = request()->ip();

        return redirect()->route('customers.index')->with('success', 'Utente creato con successo');
    }


    public function show($id)
    {

        $user = Customer::findOrFail($id);


        return view('auth.admin.customers.show', compact('user'));

    }


    public function edit($id)
    {

        $user = Customer::findOrFail($id);

        return view('auth.admin.customers.edit', compact('user',));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        /**
         * fetching the user model
         */
        $this->validate($request, ['name' => 'required', 'email' => 'required|email|unique:customers,email,' . $id]);
        $customer = Customer::findOrFail($id);


        $customer->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'confirm-password' => $request->input('confirm-password'),
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {

            $input['password'] = Hash::make($input['password']);

        }

        $customer->save();

        return redirect()->route('customers.index', ['customer' => $customer])->with('success', 'Utente modificato con successo');

    }

    public function destroy($id)
    {
        if (auth()->guard('admin')->user()) {
            Customer::findOrFail($id)->delete();

            return redirect()->route('customers.index')
                ->with('success', 'Utente eliminato con successo');
        } else {
            abort(404);
        }
    }

    public function dashboard()
    {
        if (auth()->guard('admin')->user()) {

            $customers = Customer::all();
            $products = Product::all();
            $orders = Order::all();

            return view('auth.customer.home', ['customers' => $customers, 'products' => $products, 'orders' => $orders]);

        } else {
            abort(404);
        }
    }

}
