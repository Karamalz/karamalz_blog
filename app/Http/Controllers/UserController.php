<?php

namespace App\Http\Controllers;

use App\Article;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($name)
    {
        $article = Article::where('author', '=', $name)->get();
        $roles = Role::where('uid', '=', Auth::user()->id)->get();

        return view('home')
            ->with('posts', $article)
            ->with('roles',$roles);
    }
}
