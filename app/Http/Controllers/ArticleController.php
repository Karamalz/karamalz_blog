<?php

namespace App\Http\Controllers;

use App\Article;
use App\Message;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->author = Auth::user()->name;
        $article->title = request('title');
        $article->catagory = request('catagory');
        $article->content = request('content');
        $article->save();

        return Redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$post = DB::table('articles')
        ->join('messages', 'articles.id', '=', 'message_article_id')
        ->where('message_article_id', '=', $id)
        ->get();*/
        $article = Article::where('id', '=', $id)->get();
        $message = Message::where('message_article_id', '=', $id)->get();
        $roles = Role::where('uid', '=', Auth::user()->id)->get();

        return view('show')
            ->with('articles', $article)
            ->with('messages', $message)
            ->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('edit')
            ->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->title = request('title');
        $article->catagory = request('catagory');
        $article->content = request('content');
        $article->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/home');
    }

    public function catagory($catagory)
    {
        $article = Article::where('catagory', '=', $catagory)->get();
        $roles = Role::where('uid', '=', Auth::user()->id)->get();

        return view('home')
            ->with('posts', $article)
            ->with('roles', $roles);
    }

    public function search(Request $request)
    {
        $article = Article::where('title', 'like', "%" . $request->key . "%")->get();
        $roles = Role::where('uid', '=', Auth::user()->id)->get();

        return view('home')
            ->with('posts', $article)
            ->with('roles', $roles);
    }
}
