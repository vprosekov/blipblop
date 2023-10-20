<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckCookieToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // print all cookies
        // print_r($request->cookie());
        // exit();
        if ($request->cookie('token')) {
            // send to /api/me with bearer token from cookie token
            // print_r(env("APP_URL") ."". "api/me");exit();
            
            $req = Request::create(env("APP_URL") ."". "api/me", 'GET');
            $req->headers->set('accept', 'application/json');
            $req->headers->set('authorization', 'Bearer ' . $request->cookie('token'));
            $response = app()->handle($req);
            $data = json_decode($response->getContent());
            
            



            // if the token is invalid, then redirect to login page
            if ($response->getStatusCode() != 200) {
                return redirect()->route('login');
            }
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
