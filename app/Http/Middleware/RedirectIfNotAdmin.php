<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfNotAdmin
{
/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @param  string|null  $guard
 * @return mixed
 */
public function handle($request, Closure $next, $guard = 'client')
{
  if (!Auth::guard('client')->check()) {
            return redirect('client/login');
        }

        return $next($request);

    }
}
