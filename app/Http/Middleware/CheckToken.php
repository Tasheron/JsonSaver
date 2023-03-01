<?php
namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CheckToken
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle(Request $request, Closure $next)
    {
        App::setLocale($request->locale ?? config('app.locale'));
        $user = User::where('api_token', $request->api_token)->first();
        if ($user === null || $request->api_token === null || $user->expired_at < time()) {
            return response(view('submit', [
                'status' => 'Error',
                'message' => 'Api token is invalid or expired',
            ]));
        }
        Auth::setUser($user);
        return $next($request);
    }
}