<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SignUpMail;
use App\Models\Customer;
use App\Models\User;
use App\Notifications\NewRegistrationNotification;
use App\Notifications\OrderPlacedNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    public function showRegistrationForm($lang)
    {
        return view('auth.customer.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        Mail::to('shop@admin@livewire-ecommerce.com')
            ->send(new SignUpMail($user));

        $userAdmin = User::find(2);

        $details = [
            'greeting' => 'Hai ricevuto una nuova registrazione dal sito web admin@livewire-ecommerce.com',
            'body' => 'Clicca sul pulsante qui di seguito per visualizzare gli utenti registrati',
            'thanks' => 'Grazie!',
            'subject' => 'Nuova registrazione al sito web',
            'actionText' => 'AREA RISERVATA',
            'actionURL' => url(env('APP_URL') . '/' . app()->getLocale() . env('APP_ADMIN_URL') ),
            'email' =>   $user->email,
            'billing_name' => $user->billing_name
        ];
        Notification::send($userAdmin, new NewRegistrationNotification($details));

        return redirect()->route('home', app()->getLocale())->with('success', 'Ti sei registrato con successo!');
//
//        return $request->wantsJson()
//            ? new JsonResponse([], 201)
//            : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'billing_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
//            'g-recaptcha-response' => 'required'

        ]);
    }

    protected function create(array $data)
    {

        return Customer::create([
            'email' => $data['email'],
            'billing_name' => $data['billing_name'],
           'billing_surname' => $data['billing_surname'],
//           'billing_company' => $data['billing_company'],
//           'billing_vat' => $data['billing_vat'],
//           'billing_phone' => $data['billing_phone'],
//           'billing_address' => $data['billing_address'],
//           'billing_city' => $data['billing_city'],
//           'billing_zipcode' => $data['billing_zipcode'],
//           'billing_province' => $data['billing_province'],
//
//           'shipping_name' => $data['billing_name'],
//           'shipping_surname' => $data['billing_surname'],
//           'shipping_company' => $data['billing_company'],
//           'shipping_country' => $data['shipping_country'],
//           'shipping_vat' => $data['billing_vat'],
//           'shipping_phone' => $data['billing_phone'],
//           'shipping_address' => $data['billing_address'],
//           'shipping_city' => $data['billing_city'],
//           'shipping_zipcode' => $data['billing_zipcode'],
//           'shipping_province' => $data['billing_province'],
            'password' => Hash::make($data['password']),
        ]);

    }

    // return redirect()->route('home', app()->getLocale())->with('success', 'Registrazione avvenuta');

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
