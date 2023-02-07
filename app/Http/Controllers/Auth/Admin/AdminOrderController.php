<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Mail\OrderShipped;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SubOrder;
use App\Models\SubOrderItem;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('adminAuth');
    }

    public function index()
    {

        $orders = Order::where('is_paid', '1')->orderBy('updated_at', 'DESC')->paginate(10); // fix n + 1 issues

        return view('auth.admin.orders.index', [
            'orders' => $orders,
        ]);


    }


    public function show($lang, $id)
    {

        $order = OrderItem::where('id', $id)->first();
        $orderInfo = Order::where('id', $id)->first();
        $currentNotice = Notification::where('read_at', '=', null)->first();

        if (!empty($currentNotice)) {
//                $currentNotice->read_at = Carbon::now();
//                $currentNotice->save();
            $currentNotice->delete();
        }

        if (!$orderInfo) {
            abort(404);
        }

        return view('auth.admin.orders.show', [
            'order' => $order,
            'orderInfo' => $orderInfo,
            'total' => getNumbers()->get('total'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $orderInfo = Order::findOrFail($id);
        return redirect()->route('adminOrders.show', ['orderInfo' => $orderInfo])->with('success', 'Ordine aggiornato!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function update($lang, Request $request, $id)
    {

        $order = Order::where('id', $id)->first();

        $order->update([
            'is_shipped' => $request->has('is_shipped'),
        ]);

        if ($order->is_shipped == '1') {
            Mail::to($order->email)->send(new OrderShipped($order));

        }
        //detraggo la quantità di prodotto acquistata dalla quantità di magazzino del singolo prodotto
//        foreach ($order->orderItem as $subOrdItem) {
//            $subOrdItem->product()->decrement('PezziConfezione', $subOrdItem->quantity);
//        }
        $subOrder = SubOrder::where('order_id', $order->id)->first();
        $order->is_paid = '1';
        $order->status = 'completed';

        // sottraggo ai prodotti il numero delle quantità di magazzino dopo il pagamento con Stripe
        $order->items()->decrement('stock_qty', $subOrder->item_count);

        $order->save();

        //inserisco una nuova transazione
        $transactionUpdate = new Transaction();
        $subOrderItem = SubOrder::where('order_id', $order->id)->first();
        $transactionUpdate->sub_order_id = $subOrderItem->id;
        $transactionUpdate->transaction_id = $subOrderItem->id;
        $transactionUpdate->amount_paid = $order->grand_total;
        $transactionUpdate->payer_email = $order->customer->email;
        $transactionUpdate->payer_order_id = $order->id;
        $transactionUpdate->customer_id = $order->customer_id;
        $transactionUpdate->status = 'completed';
        $transactionUpdate->save();

        return redirect()->route('adminOrders.show', ['lang' => app()->getLocale(), $order->id])->with('success', 'Spedizione confermata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function cancelOrder($lang, $id)
    {
        $orderId = Order::where('id', $id)->first();

        $orderId->status = "decline";
        $orderId->is_shipped = "0";
        $orderId->update();
        return redirect()->route('dashboard', app()->getLocale())->with('success', 'Hai annullato correttamente un ordine!');
    }
}
