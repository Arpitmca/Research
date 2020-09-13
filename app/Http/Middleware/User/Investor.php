<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Investor
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect(route("home"));
        }
        if (!Auth::user()->email_verified_at) {
            return redirect(route("verification.notice"));
        }
        $user = Auth::user()->isInvestor();
        if ($user === true) {
            return $next($request);
        }
        Log::critical("An unauthorized user tried to access operator dashboard.");
        return redirect(route("home"))->withInfo("This page is not available for you as in current state. Only Investors can access this page.");
    }
}
