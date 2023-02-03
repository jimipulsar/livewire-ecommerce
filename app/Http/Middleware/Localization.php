<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    private $languages = ['it', 'en'];

    public function handle(Request $request, Closure $next)
    {

        if (!$request->lang) {
            return redirect()->to(app()->getLocale());
        }

        if (!in_array($request->lang, $this->languages)) {
            abort(404);
        }

        return $next($request);
    }
}
