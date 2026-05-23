<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class CheckBlockedUser
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (
            auth()->check()
            &&
            auth()->user()->is_blocked
        ) {

            auth()->logout();

            return redirect()

                ->route('login')

                ->with(

                    'error',

                    'Your account has been blocked.'
                );
        }

        return $next($request);
    }
}