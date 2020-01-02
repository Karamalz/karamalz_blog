<?php

namespace App\Http\Middleware;

use Closure;
use App\services\ArticleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleAuthorRoleMiddleware
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function handle($request, Closure $next)
    {
        $article = $this->articleService->getArticle($request->route('id'));
        if(Auth::user()->roles->roles=='normal' && $article[0]->author_id != Auth::user()->id) {
            flash('You are not the author!'); 
            return back();
        }
        return $next($request);
    }
}
