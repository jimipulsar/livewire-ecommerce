<?php

namespace App\View\Composer;

use App\Models\Category;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class NotificationComposer
{

    protected $notifications;
    protected $orders;
//    protected $customers;

    public function __construct()
    {
        $this->notifications = Notification::where('read_at', '=', null)->get();
        $this->orders = DB::table('orders')->orderBy('created_at', 'DESC')->get();
        $this->customers = DB::table('customers')->orderBy('created_at', 'DESC')->get();

    }

    public function compose(View $view)
    {
        $view->with([
            'orders' => $this->orders,
            'notifications' => $this->notifications,
            'customers' => $this->customers
        ]);
    }
}
