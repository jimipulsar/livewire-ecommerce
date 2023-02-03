<?php

namespace App\Listeners;

use App\Events\AdminLoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminListenerHistory
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
    public function handle(AdminLoginHistory $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        if (isset($event->admin)) {
            $adminInfo = $event->admin;
        }

        if (isset($adminInfo)) {
            return DB::table('admin_login_history')->insert(
                ['name' => $adminInfo->name,
                    'email' => $adminInfo->email,
                    'IP' => \request()->ip(),
                    'browser' => \request()->header('User-Agent'),
                    'created_at' => $current_timestamp,
                    'updated_at' => $current_timestamp]
            );
        }
    }
}
