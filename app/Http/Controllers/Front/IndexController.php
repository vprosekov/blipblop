<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    public function index()
    {
        return view('newsfeed');
    }

    public function login()
    {
        return view('login');
    }
    public function register(Request $request)
    {
        return view('register');
    }

    public function logout(Request $request)
    {
        // send request to /api/logout
        // if token is not set or length small in cookie, then redirect to /login
        // print_r($_COOKIE["token"]);
        // exit();
        if (!$_COOKIE["token"] || strlen($_COOKIE["token"]) < 10) {
            return redirect()->route('login');
        }
        $req = Request::create(env("APP_URL") . "" . "api/logout", 'GET');
        $req->headers->set('Accept', 'application/json');
        $req->headers->set('Authorization', 'Bearer ' . $_COOKIE["token"]);
        $response = app()->handle($req);
        // redirect to /login
        return redirect()->route('login');
    }

    public function userpage($user_id)
    {
        $req = Request::create(env("APP_URL") . "" . "api/user/" . $user_id, 'GET');
        $req->headers->set('Accept', 'application/json');
        $req->headers->set('Authorization', 'Bearer ' . $_COOKIE["token"]);
        $response = app()->handle($req);
        $user = json_decode($response->getContent())->data->user;
        if (!$user) {
            return redirect()->route('newsfeed');
        }
        return view('profile', ['user' => $user]);
    }

    public function users(){
        return view('users');
    }
}
