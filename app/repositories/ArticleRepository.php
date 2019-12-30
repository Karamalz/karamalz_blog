<?php

use App\Article;

class ArticleRepository{

    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }


}