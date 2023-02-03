<?php

namespace App\Listeners;

use App\Events\CustomerLoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerListenerHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return bool
     */
    public function handle(CustomerLoginHistory $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        if (isset($event->customer)) {
            $customerInfo = $event->customer;
        }

        if (isset($customerInfo)) {
            return DB::table('customer_login_history')->insert(
                ['name' => $customerInfo->billing_name,
                    'email' => $customerInfo->email,
                    'IP' => \request()->ip(),
                    'browser' => \request()->header('User-Agent'),
                    'created_at' => $current_timestamp,
                    'updated_at' => $current_timestamp]
            );
        }
    }
}
