<?php

namespace App\Repositories;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageRepository{

    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function messageStore(Request $request, $article_id)
    {
        Message::create([
            'message_article_id' => $article_id,
            'message_author_id' => Auth::user()->id,
            'message_author' => Auth::user()->name,
            'message_content' => $request->content,
        ]);

        return;
    }

    public function messageDestroy($id)
    {        
        return Message::where('message_id', '=', $id)->delete();
    }

    public function getmessageById($id)
    {
        return message::where('message_id', '=', $id)->get();
    }
    
    public function getmessageByArticleId($id)
    {
        return message::where('message_article_id', '=', $id)->get();
    }

}