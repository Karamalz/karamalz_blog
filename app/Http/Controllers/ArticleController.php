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

    public function index()
    {
        return view('home')
            ->with('posts',$this->articleRepo->getAllArticle());
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
        echo $id;
        return view('show')
            ->with('articles', $this->articleRepo->getArticleById($id))
            ->with('messages', $this->messageRepo->getMessageByArticleId($id));
    }

    public function edit($id)
    {
        $article = $this->articleRepo->getArticleById($id);
        abort_if(Auth::user()->roles->roles=='normal' && $article[0]->author_id != Auth::user()->id,403);
        return view('edit')
            ->with('articles', $article);
    }

    public function update(Request $request, $id)
    {
        $article = $this->articleRepo->getArticleById($id);
        abort_if(Auth::user()->roles->roles=='normal' && $article[0]->author_id != Auth::user()->id,403);
        $this->articleRepo->articleEdit($request, $id);

        return redirect('/home');
    }

    public function destroy($id)
    {
        $article = $this->articleRepo->getArticleById($id);
        abort_if(Auth::user()->roles->roles=='normal' && $article[0]->author_id != Auth::user()->id,403);
        $this->articleRepo->articleDestroy($id);

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

    public function user($name)
    {
        return view('home')
            ->with('posts', $this->articleRepo->getArticleByUsername($name));
    }
}
