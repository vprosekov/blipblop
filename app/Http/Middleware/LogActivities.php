<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ActivityLog;

class LogActivities
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('api/me')) {
            return $next($request);
        }
        $activity = new ActivityLog();
        $activity->user_id = auth()->user() ? auth()->user()->id : null;
        $activity->activity_method = $request->method();
        $activity->activity_url = $request->fullUrl();
        // remove password if exists
        $activity->activity_data = json_encode($request->except(['password', 'password_confirmation']));
        $activity->save();

        return $next($request);
    }
}
