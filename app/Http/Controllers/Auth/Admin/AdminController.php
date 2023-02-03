<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Events\AdminLoginHistory;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class AdminController extends Controller
{
//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except('logout');


    }

    public function getLogin()
    {
        if (auth()->guard('admin')->user()) {
            return redirect()->route('dashboard', app()->getLocale());
        }
        return view('auth.admin.login');
    }

    /**
     * @throws ValidationException
     */

    public function postLogin($lang, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $admin = auth()->guard('admin')->user();

            event(new AdminLoginHistory($admin));
            return redirect()->route('dashboard', app()->getLocale())->with('success', 'Autenticazione avvenuta!');

        } else {
            return $this->sendFailedLoginResponse($request);
        }

    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('adminLogin', app()->getLocale());
    }

    public function adminLogout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('adminLogin', app()->getLocale())->with('success', 'Sei uscito correttamente');
    }

    public function login()
    {

        return view('auth.admin.login');


    }

    public function shipments()
    {

        if (auth()->guard('admin')->check()) {
            $orders = DB::table('orders')->distinct()->get('shipping_zipcode');

            foreach ($orders as $order) {
                $zipcode = PostalCode::get($order->shipping_zipcode);

                if (!$zipcode) {
                    return back()->withErrors(['zipcode' => [__('Il codice postale non è valido')]]);
                }
            }

            $carriers = Carrier::quote(5);

            $carriers->from(array(
                'country' => 'IT',
                'zip' => config('app.warehouse.zip')
            ));

            $carriers->to(array(
                'country' => 'IT',
                'zip' => '06121',
            ));

            $shipments = Shipment::all();
//           $shipments = DB::table('shipments')->paginate(5);

//            dd($shipments[0]->delivery['city']);
            $data = $this->pagination($shipments);

            return view('auth.admin.shipments.index')
                ->with('couriers', $carriers->all())
                ->with('data', $data);

        } else {
            return redirect()->route('index', app()->getLocale());
        }

    }

    public function pagination($items, $perPage = 5, $page = null, $options = [], $pageName = 'page')
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ], $options);
    }

    public function dashboard()
    {
        if (auth()->guard('admin')->check()) {
            $notifications = DB::table('notifications')->orderBy('created_at', 'DESC')->get();
            $customers = Customer::all();
            $products = DB::table('products')->count();
            $orders = Order::orderBy('created_at', 'DESC')->paginate(8);
//dd(json_decode($notifications[0]->data, true)->billing_name);
            return view('auth.admin.dashboard', [
                'customers' => $customers,
                'products' => $products,
                'orders' => $orders,
                'notifications' => $notifications,
            ]);
        } else {
            return redirect()->route('index', app()->getLocale());
        }

    }

    public function searchOrder()
    {
        if (auth()->guard('admin')->check()) {
            $pagination = 6;
            $notifications = DB::table('notifications')->orderBy('created_at', 'DESC')->get();
            $customers = DB::table('customers')->orderBy('created_at', 'DESC')->get();
            $products = DB::table('products')->count();

            $o = trim(\request()->input('o'));
//            dd($o);
            $query = \request()->all();
            $orders = Order::query()->where('order_number', 'LIKE', '%' . $o . '%')
                ->orWhere('billing_name', 'LIKE', '%' . $o . '%')
                ->paginate($pagination);
            $orders->appends(['search' => $o]);

            if (count($orders) > 0) {
                return view('auth.admin.dashboard')->withDetails($orders)->withQuery($o)->with([
                    'o' => $o,
                    'query' => $query,
                    'products' => $products,
                    'customers' => $customers,
                    'notifications' => $notifications,
                    'orders' => $orders,
                ]);
            } else {
                return redirect()->back()->with('danger', 'Corrispondenza non trovata');
            }
        } else {
            return redirect()->route('index', app()->getLocale());
        }
    }
}
