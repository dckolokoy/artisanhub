<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class is_verified
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

        if(auth()->user()->is_verified == 0){
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            $request->session()->flash('message', 'Please wait for you account approval, check email for update!');
            return redirect('/login');
        }
        return $next($request);
    }
}
