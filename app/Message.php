<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $primarykey = 'message_id';

    protected $fillable = [
        'message_article_id', 'message_author_id', 'message_author', 'message_content'
    ];
}
