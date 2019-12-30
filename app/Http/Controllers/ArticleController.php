<?php

namespace App\Http\Controllers;

use App\repositories\ArticleRepository;
use App\repositories\MessageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    protected $articleRepo;
    protected $messageRepo;

    public function __construct(ArticleRepository $articleRepo, MessageRepository $messageRepo)
    {
        $this->articleRepo = $articleRepo;
        $this->messageRepo = $messageRepo;
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->articleRepo->articleStore($request);

        return Redirect('/home');
    }

    public function show($id)
    {
        return view('show')
            ->with('articles', $this->articleRepo->getArticleById($id))
            ->with('messages', $this->messageRepo->getMessageByArticleId($id));
    }

    public function edit(Article $article)
    {
        return view('edit')
            ->with('article', $article);
    }

    public function update(Request $request, Article $article)
    {
        $this->articleRepo->articleEdit($request, $article->id);

        return redirect('/home');
    }

    public function destroy(Article $article)
    {
        $this->articleRepo->articleDestroy($article->id);

        return redirect('/home');
    }

    public function catagory($catagory)
    {
        return view('home')
            ->with('posts', $this->articleRepo->getArticleByCatagory($catagory));
    }

    public function search(Request $request)
    {
        return view('home')
            ->with('posts', $this->articleRepo->getArticleByKeyword($request->key));
    }
}
