<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\LogType;
use Illuminate\Support\Facades\Auth;

class LoggingMiddleware
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
        $response = $next($request);

        if ($response) {
            Log::create([
                'user_id' => Auth::id(),
                'log_type_id' => LogType::select('id')->where('success')->first(),
                'data' => $response
            ]);
        }

        return $response;
    }
}
