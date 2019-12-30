<?php

namespace App\Http\Controllers;

use App\Article;
use App\Role;
use App\Message;
use DB;
use App\repositories\MessageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    protected $messageRepo;

    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepo = $messageRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $article_id)
    {
        $this->messageRepo->messageStore($request, $article_id);

        return redirect('/article/'.$article_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($article_id, $message_id)
    {
        $this->messageRepo->messageDestroy($message_id);
        
        return Redirect('/article/'.$article_id);
    }
}
