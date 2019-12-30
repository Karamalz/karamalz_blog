<?php

namespace App\Http\Controllers;

use App\repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $articleRepo;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepo = $articleRepo;
    }
    
    public function show($name)
    {
        return view('home')
            ->with('posts', $this->articleRepo->getArticleByUsername($name));
    }
}
