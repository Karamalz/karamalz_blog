<?php

namespace App\services;

use App\repositories\MessageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageService
{
    protected $messageRepo;

    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepo = $messageRepo;
    }

    public function getMessage($message_id)
    {
        return $this->messageRepo->getMessageById($message_id);
    }

    public function store($request, $article_id)
    {
        $this->messageRepo->messageStore($request, $article_id);
        return;
    }

    public function destroy($message_id)
    {
        $this->messageRepo->messageDestroy($message_id);        
        return;
    }
}