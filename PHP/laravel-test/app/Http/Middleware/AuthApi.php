<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthApi
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
        echo 
        '<style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body{
                font-size: 30px;
                font-family: sans-serif;
            }
            h1{
                color: #818181;
                text-align: center;
                margin: 10px auto 30px;
            }
        </style>
        <h1>
            Request API <br/>
        </h1>';
        return $next($request);
    }
}
