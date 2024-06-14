<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class VerifyUser
{

    public function handle(Request $request, Closure $next): Response
    {
        $auth_user = DB::table('users')->where('email',Auth::user()->email)->first();
        if( $auth_user->email_verified_at == null ){
            return redirect()->route('auth.verify.email.prompt')->with('error',__('messages.dear_user_your_account_has_not_been_activated'));
        }
        return $next($request);
    }
}
