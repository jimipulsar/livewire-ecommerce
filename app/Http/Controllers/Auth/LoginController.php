<?php

namespace App\Http\Controllers\Auth;

use App\Events\CustomerLoginHistory;
use App\Events\LoginHistory;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Wishlist;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('customer')->except('logout');
    }

    public function login()
    {
        if (auth()->guard('customer')->check()) {
            $customer = Auth::guard('customer')->user();
            return view('auth.customer.home', ['customer' => $customer]);
        } else {
            return view('auth.customer.login');
        }
    }
//    public function getLogin()
//    {
//
//        return view('pages.popup');
//    }

    public function showLoginForm()
    {
        if (auth()->guard('customer')->check()) {
            $customer = Auth::guard('customer')->user();
            $orders = auth()->guard('customer')->user()->orders()->with('products')->orderBy('created_at', 'DESC')->paginate(6);
            if (!$orders) {
                abort(404);
            }
            return view('auth.customer.home', [
                'orders' => $orders,
                'customer' => $customer]);
        } else {
            return view('auth.customer.home');
        }
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
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('customer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),$remember_me])) {
            $wishSession = session()->get('wishlist');

            if (isset($wishSession)) {

                foreach ($wishSession as $wish) {

                    $wishItem = Wishlist::firstOrNew([
                        'customer_id' => auth()->guard('customer')->user()->id,
                        'product_id' => $wish['product_id']

                    ]);
                    session()->forget('wishlist');
                    $wishItem->save();
                }


            }
            session()->forget('wishlist');
            $customer = Auth::user();

            event(new CustomerLoginHistory($customer));

//            RateLimiter::clear($this->throttleKey());
            return redirect()->route('orders.index', app()->getLocale())->with('success', 'Autenticazione avvenuta!');


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
        return Auth::guard('customer');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
//        Session::flush();

        return redirect()->route('home', app()->getLocale())->with('success', 'Sei uscito correttamente');

    }

    protected function loggedOut(Request $request)
    {
        //
    }
}
