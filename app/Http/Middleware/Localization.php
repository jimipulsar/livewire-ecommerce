<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Localization
{
    private $languages = ['it', 'en'];

    public function handle(Request $request, Closure $next)
    {
        $url = \Illuminate\Support\Facades\Request::segment(1);

        if ($url == null) {
            return redirect()->route('index', app()->getLocale());
        }

        if (!in_array($url, $this->languages))
            abort(404);

        return $next($request);


    }
}
