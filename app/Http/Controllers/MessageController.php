<?php

namespace App\Http\Controllers;

use App\Http\Requests\messageRequest;
use App\services\MessageService;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function store(messageRequest $request, $article_id)
    {
        $this->messageService->store($request, $article_id);

        return redirect('/article/' . $article_id);
    }

    public function destroy($article_id, $message_id)
    {
        $this->messageService->destroy($message_id);

        return Redirect('/article/' . $article_id);
    }
}
