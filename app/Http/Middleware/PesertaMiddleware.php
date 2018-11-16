<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PesertaMiddleware
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
    if (Auth::User()->tipe != 5) return $next($request);
    return abort('404');
  }
}
