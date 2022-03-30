<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CrmAuthentication
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
        if (!$request->session()->exists('crmAuth')):
            $request->session()->flush();
            $request->session()->regenerate();
            session_start();
            session_destroy();
            return redirect(route('userLogin'))->with('error','Please login to continue');
        endif;
        return $next($request);
    }
}
