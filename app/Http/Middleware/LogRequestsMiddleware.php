<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class LogRequestsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if logging is enabled in configuration
        if (!Config::get('request_logger.enabled', true)) {
            return $next($request);
        }

        // Start measuring time
        $startTime = microtime(true);

        // Process the request
        $response = $next($request);

        // Calculate response time
        $responseTime = microtime(true) - $startTime;

        // Log data to the database
        DB::table('request_logs')->insert([
            'method'       => $request->method(),
            'url'          => $request->fullUrl(),
            'status_code'  => $response->getStatusCode(),
            'response_time' => $responseTime,
            'created_at'   => now(),
        ]);

        return $response;
    }
}
