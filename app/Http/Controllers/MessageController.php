<?php

namespace App\Http\Controllers;

use App\Article;
use App\Role;
use App\Message;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
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
        $message = new Message();
        $message->message_article_id = $article_id;
        $message->message_author = Auth::user()->name;
        $message->message_content = $request->content;
        $message->save();

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
        $message = Message::where('message_id', '=', $message_id)->delete();
        return Redirect('/article/'.$article_id);
    }
}
