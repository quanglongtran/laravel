<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        // echo 
        '<style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body{
                font-family: sans-serif;
            }
            h1{
                color: #818181;
                text-align: center;
                margin: 10px auto 30px;
            }
        </style>
        <h1>
            Middleware Request <br/>
        </h1>';
        
        // if (!$this -> isLogin()) {
        //     return redirect(route('tin-tuc'));
        // }
        // if ($request -> is('admin/*') || $request -> is('admin')) {
        //     echo 'you are admin now';
        // };
        // $url = $request -> url();
        // echo $url;
        return $next($request);
    }

    public function isLogin() {
        return false;
    }
}
