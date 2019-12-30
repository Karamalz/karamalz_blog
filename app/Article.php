<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function messages()
    {
        return $this->hasMany('App\Message', 'message_article_id');
    }
}
