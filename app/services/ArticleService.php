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

    public function __construct(ArticleRepository $articleRepo, MessageRepository $messageRepo, RoleRepository $roleRepo)
    {
        $this->articleRepo = $articleRepo;
        $this->messageRepo = $messageRepo;
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        if(Auth::check()) $this->roleRepo->checkRoleInit(Auth::user()->id);
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
        return $article;
    }

    public function update($request, $id)
    {
        $this->articleRepo->articleEdit($request, $id);
        return;
    }

    public function destroy($id)
    {
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

    public function getArticle($id)
    {
        return $this->articleRepo->getArticleById($id);
    }
}