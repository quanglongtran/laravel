<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckLoginAdmin
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

        $checkToken = Cookie::get('token') != '';

        if (session() -> has('logged_in') and session('logged_in') == 1 and $checkToken ) {
            return $next($request);
        }
        
        return redirect() -> route('index') -> with(['message' => 'Vui lòng đăng nhập!', 'type' => 'danger']);
    }
}
