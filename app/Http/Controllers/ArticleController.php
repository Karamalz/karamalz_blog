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
        return view('show')
            ->with('articles', $this->articleRepo->getArticleById($id))
            ->with('messages', $this->messageRepo->getMessageByArticleId($id));
    }

    public function edit($id)
    {
        return view('edit')
            ->with('articles', $this->articleRepo->getArticleById($id));
    }

    public function update(Request $request, $id)
    {
        $this->articleRepo->articleEdit($request, $id);

        return redirect('/home');
    }

    public function destroy($id)
    {
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
