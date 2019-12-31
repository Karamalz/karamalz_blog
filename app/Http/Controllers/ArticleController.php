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
        $this->validate(
            $request, 
            [
                'title' => ['required', 'max:255', 'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/'],
                'catagory' => ['required'],
                'content' => ['regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/']
            ],
            [
                'title.required' => 'title is required',
                'title.max' => 'title max length is 255',
                'title.regex' => 'your title contains an unacceptable character',
                'catagory.require' => 'catagory is required',
                'content.regex' => 'your content contains an unacceptable character'
            ]
        );
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
        $article = $this->articleRepo->getArticleById($id);
        abort_if(Auth::user()->roles->roles=='normal' && $article[0]->author_id != Auth::user()->id,403);
        return view('edit')
            ->with('articles', $article);
    }

    public function update(Request $request, $id)
    {
        $validate = $this->validate(
            $request, 
            [
                'title' => ['required', 'max:255', 'regex:[A-Za-z0-9]'],
                'catagory' => ['required'],
                'content' => ['required', 'regex:[A-Za-z0-9]']
            ],
            [
                'title.required' => 'title is required',
                'title.max' => 'title max length is 255',
                'title.regex' => 'your title contains an unacceptable character',
                'catagory.required' => 'catagory is required',
                'content.required' => 'contetn is required',
                'content.regex' => 'your content contains an unacceptable character',
            ]
        );
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
