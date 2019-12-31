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

    public function store($request, $article_id)
    {
        $this->messageRepo->messageStore($request, $article_id);
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($message_id)
    {
        $this->messageRepo->messageDestroy($message_id);        
        return;
    }
}