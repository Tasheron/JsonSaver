<?php
namespace App\Http\Middleware;

use App\Models\JsonObject;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CheckAuthor
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
        if (Auth::id() != JsonObject::find($request->id)?->author) {
            return response(view('submit', [
                'status' => 'Error',
                'message' => 'You can`t update this json, because you are not the author or id is invalid',
            ]));
        }
        return $next($request);
    }
}