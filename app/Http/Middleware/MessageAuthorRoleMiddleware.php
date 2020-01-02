<?php

namespace App\Http\Middleware;

use Closure;
use App\services\MessageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageAuthorRoleMiddleware
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function handle($request, Closure $next)
    {
        $message = $this->messageService->getMessage($request->route('message_id'));
        if(Auth::user()->roles->roles=='normal' && $message[0]->message_author_id != Auth::user()->id) {
            flash('You are not the author!'); 
            return back();
        }
        return $next($request);
    }
}
