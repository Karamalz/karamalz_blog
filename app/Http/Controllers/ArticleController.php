<?php

namespace App\Http\Controllers;

use App\Article;
use App\Message;
use App\Role;
use App\repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    protected $articleRepo;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepo = $articleRepo;
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
        $this->articleRepo->articleStore($request);

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
        $message = Message::where('message_article_id', '=', $id)->get();
        $roles = Role::where('uid', '=', Auth::user()->id)->get();

        return view('show')
            ->with('articles', $this->articleRepo->getArticleById($id))
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
        $this->articleRepo->articleEdit($request, $article->id);

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
        $this->articleRepo->articleDestroy($article->id);

        return redirect('/home');
    }

    public function catagory($catagory)
    {
        $article = $this->articleRepo->getArticleByCatagory($catagory);
        $roles = Role::where('uid', '=', Auth::user()->id)->get();

        return view('home')
            ->with('posts', $article)
            ->with('roles', $roles);
    }

    public function search(Request $request)
    {
        $article = $this->articleRepo->getArticleByKeyword($request->key);
        $roles = Role::where('uid', '=', Auth::user()->id)->get();

        return view('home')
            ->with('posts', $article)
            ->with('roles', $roles);
    }
}
