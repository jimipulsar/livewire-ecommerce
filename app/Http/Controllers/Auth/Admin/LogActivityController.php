<?php

namespace App\Http\Controllers\Auth\Admin;


use App\Http\Controllers\Controller;
use App\Models\AdminLogin;
use App\Models\CustomerLogin;
use Illuminate\Support\Facades\Auth;

class LogActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth')->except('logout');
    }

    public function index()
    {
        if (Auth::guard('admin')->check()) {

            $logs = CustomerLogin::orderBy('id', 'DESC')->paginate(10);

            if (!$logs) {
                abort(404);
            }

            return view('auth.admin.activity', ['logs' => $logs]);

        } else {
            return redirect()->route('index', app()->getLocale());
        }


    }
    public function admin()
    {
        if (Auth::guard('admin')->check()) {

            $logs = AdminLogin::orderBy('id', 'DESC')->paginate(10);

            if (!$logs) {
                abort(404);
            }

            return view('auth.admin.admin-activity', ['logs' => $logs]);

        } else {
            return redirect()->route('index', app()->getLocale());
        }


    }
}
