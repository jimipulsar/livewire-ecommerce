<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubOrder;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\OrderPlacedNotification;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;


class CheckOutController extends Controller
{

    public function __construct()
    {

//        $this->middleware('auth');
        $this->middleware('customerAuth');


    }

    public function index(Request $id)
    {
        if (auth()->guard('customer')->check()) {

            $validator = Validator::make(\request()->all(), [
                'shipping_zipcode' => 'regex:/\b\d{5}\b/'

            ]);
            $product = Product::find($id);

            if (!$product) {
                abort(404);
            }
            if ($validator->fails()) {
                return redirect()->route('address', app()->getLocale())
                    ->withErrors($validator);

            }


            $customer = auth()->guard('customer')->user();


            $cart = session()->get('cart');

            session()->put('cart', $cart);

            return view('pages.checkout', [
                'total' => getNumbers()->get('total'),
                'customer' => $customer,
                'discount' => getNumbers()->get('discount'),
                'newTax' => getNumbers()->get('newTax'),
                'newTotal' => getNumbers()->get('newTotal'),
                'newSubtotal' => getNumbers()->get('newSubtotal'),


            ]);
        } else {
            return redirect()->intended('customerLogin', app()->getLocale());
        }
    }

    public function paymentStripe()
    {
        return view('pages.checkout');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store($lang)
    {

        \request()->validate([
            'shipping_name' => 'required',
            'shipping_surname' => 'required',
            'shipping_city' => 'required',
            'shipping_country' => 'required',
            'shipping_province' => 'required',
            'shipping_address' => 'required',
            'shipping_zipcode' => 'required',
            'shipping_phone' => 'required',
        ]);

        $order = new Order();

        $order->order_number = strtoupper(uniqid());
        $order->email = \request()->input('email');
        $order->billing_name = \request()->input('billing_name');
        $order->billing_surname = \request()->input('billing_surname');
        $order->billing_company = \request()->input('billing_company');
        $order->billing_vat = \request()->input('billing_vat');
        $order->billing_city = \request()->input('billing_city');
        $order->billing_address = \request()->input('billing_address');
        $order->billing_phone = \request()->input('billing_phone');
        $order->billing_zipcode = \request()->input('billing_zipcode');
        $order->billing_province = \request()->input('billing_province');
        $order->billing_country = \request()->input('billing_country');
        $order->shipping_name = \request()->input('shipping_name');
        $order->shipping_surname = \request()->input('shipping_surname');
        $order->shipping_company = \request()->input('shipping_company');
        $order->shipping_city = \request()->input('shipping_city');
        $order->shipping_address = \request()->input('shipping_address');
        $order->shipping_phone = \request()->input('shipping_phone');
        $order->shipping_zipcode = \request()->input('shipping_zipcode');
        $order->shipping_province = \request()->input('shipping_province');
        $order->shipping_country = \request()->input('shipping_country');
        $order->notes = \request()->input('notes');


        $cart = session()->get('cart');
        $coupon = session()->get('coupon');

        if ($coupon) {
            $order->discount = $coupon['discount'];
        }

        $order->grand_total = getNumbers()->get('newTotal');
        $order->customer_id = auth()->guard('customer')->user()->id;

        if (request('wire_transfer') == 'wire_transfer') {

            try {

                $order->payment_method = 'wire transfer';
                $order->status = 'pending';
                $order->save();

                foreach ($cart as $item) {
                    $order->items()->attach($item['id'], ['price' => $item['price'] * $item['quantity'], 'quantity' => $item['quantity']]);

                }

                $order->generateSubOrders();

                $user = User::find(1);

                $details = [
                    'greeting' => 'Hai ricevuto un nuovo ordine dal livewire ecommerce web app',
                    'body' => 'Clicca sul pulsante qui di seguito per visualizzare gli ordini ricevuti',
                    'thanks' => 'Grazie!',
                    'subject' => 'Nuovo Ordine Ricevuto',
                    'actionText' => 'AREA RISERVATA',
                    'actionURL' => url(env('APP_URL') . '/' . app()->getLocale()  . env('APP_ADMIN_URL') ),
                    'order_id' => $order->order_number,
                    'name' => $order->shipping_name
                ];
                Notification::send($user, new OrderPlacedNotification($details));

                $newNotice = \App\Models\Notification::orderBy('created_at', 'DESC')->latest()->first();
                $newNotice->order_id = $order->id;
                $newNotice->save();

                Mail::to($order->email)->send(new OrderMail($order));

                \request()->session()->forget('cart');
                \request()->session()->forget('coupon');
                return redirect()->route('orders.index', app()->getLocale())->with('success', 'Ordine effettuato con pagamento Bonifico. Riceverà a breve una e-mail.');

            } catch (\Throwable $e) {

                return back()->withErrors('Errore! ' . $e->getMessage());
            }

        } else {

            try {
                $order->payment_method = 'card';
                $order->status = 'processing';
                $order->is_paid = '1';
                $order->save();

                foreach ($cart as $item) {
                    $order->items()->attach($item['id'], ['price' => $item['price'] * $item['quantity'], 'quantity' => $item['quantity']]);

                }
                $order->generateSubOrders();

                $user = User::find(1);

                // inserisco transazione per avvenuto pagamento
                $newTransaction = new Transaction;
                $subOrder = SubOrder::where('order_id', $order->id)->first();
                $newTransaction->sub_order_id = $subOrder->id;
                $newTransaction->transaction_id = $order->id;
                $newTransaction->amount_paid = $order->grand_total;
                $newTransaction->payer_email = $order->customer->email;
                $newTransaction->payer_order_id = $order->id;
                $newTransaction->customer_id = $order->customer_id;
                $newTransaction->status = 'completed';
                $newTransaction->save();

                $details = [
                    'greeting' => 'Hai ricevuto un nuovo ordine dal livewire ecommerce web app',
                    'body' => 'Clicca sul pulsante qui di seguito per visualizzare gli ordini ricevuti',
                    'thanks' => 'Grazie!',
                    'subject' => 'Nuovo Ordine Ricevuto',
                    'actionText' => 'AREA RISERVATA',
                    'actionURL' => url(env('APP_URL') . '/' . app()->getLocale() . env('APP_ADMIN_URL') ),
                    'order_id' => $order->order_number,
                    'name' => $order->shipping_name
                ];

                Notification::send($user, new OrderPlacedNotification($details));
                Mail::to($order->email)->send(new OrderMail($order));

                // sottraggo ai prodotti il numero delle quantità di magazzino dopo il pagamento con Stripe
//                $order->items()->decrement('stock_qty', $subOrder->item_count);

                $newNotice = \App\Models\Notification::orderBy('created_at', 'DESC')->latest()->first();
                $newNotice->order_id = $order->id;
                $newNotice->save();

                Stripe::charges()->create([

                    'currency' => 'EUR',
                    'amount' => getNumbers()->get('newTotal'),
                    'description' => 'Ordine # ' . $order->order_number,
                    'receipt_email' => $order->email,
                    'source' => \request()->stripeToken,
                ]);
                \request()->session()->forget('cart');
                \request()->session()->forget('coupon');
                return redirect()->route('orders.index', app()->getLocale())->with('success', 'Pagamento effettuato con successo! Grazie per l\'acquisto. Riceverà a breve una e-mail.');

            } catch (\Throwable $e) {
                return back()->withErrors('Errore! ' . $e->getMessage());
            }
        }
    }

}




