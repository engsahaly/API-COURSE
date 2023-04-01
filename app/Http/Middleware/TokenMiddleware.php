<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenMiddleware
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

        $request->bearerToken();

        if ($request->bearerToken()) {
            $user = Auth::guard('sanctum')->user();
            if ($user) {
                return $next($request);
            } else {
                return ApiResponse::sendResponse(401, __('messages.token_not_valid'), null);
            }
        } else {
            return ApiResponse::sendResponse(404, __('messages.missing_token'), null);
        }
    }
}
