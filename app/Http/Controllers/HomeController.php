<?php

namespace App\Http\Controllers;

use App\Role;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Article::all();
        $roles = Role::where('uid', '=', Auth::user()->id)->get();
        return view('home')
            ->with('posts',$posts)
            ->with('roles',$roles);
    }
}
