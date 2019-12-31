<?php

namespace App\services;

use App\repositories\ArticleRepository;
use App\repositories\MessageRepository;
use App\repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleService
{
    protected $articleRepo;
    protected $messageRepo;
    protected $roleRepo;

    public function __construct(ArticleRepository $articleRepo, MessageRepository $messageRepo, RoleRepository $roleRepo)
    {
        $this->articleRepo = $articleRepo;
        $this->messageRepo = $messageRepo;
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        return $this->articleRepo->getAllArticle();
    }

    public function store(Request $request)
    {
        $this->articleRepo->articleStore($request);

        return;
    }

    public function show($id)
    {
        $article = $this->articleRepo->getArticleById($id);
        $message = $this->messageRepo->getMessageByArticleId($id);

        return [
            'articles' => $article,
            'messages' => $message
        ];
    }

    public function edit($id)
    {
        $article = $this->articleRepo->getArticleById($id);
        abort_if(Auth::user()->roles->roles=='normal' && $article[0]->author_id != Auth::user()->id, 403, 'You are not the author!');
        return $article;
    }

    public function update($request, $id)
    {
        $article = $this->articleRepo->getArticleById($id);
        abort_if(Auth::user()->roles->roles=='normal' && $article[0]->author_id != Auth::user()->id, 403, 'You are not the author!');
        $this->articleRepo->articleEdit($request, $id);

        return;
    }

    public function destroy($id)
    {
        $article = $this->articleRepo->getArticleById($id);
        abort_if(Auth::user()->roles->roles=='normal' && $article[0]->author_id != Auth::user()->id, 403, 'You are not the author!');
        $this->articleRepo->articleDestroy($id);

        return;
    }

    public function catagory($catagory)
    {
        return $this->articleRepo->getArticleByCatagory($catagory);
    }

    public function search($key)
    {
        return $this->articleRepo->getArticleByKeyword($key);
    }

    public function user($name)
    {
        return $this->articleRepo->getArticleByUsername($name);
    }
}