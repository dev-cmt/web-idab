<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == '0' && Auth::user()->status == '0') {
                return redirect()->route('registation-payment.create');
            }else{
                if (Auth::user()->is_admin == '1' && Auth::user()->status == '0') {
                    return redirect()->route('member-approve.padding');
                }else{
                    return $next($request);
                }
            }
        }
    }
}
