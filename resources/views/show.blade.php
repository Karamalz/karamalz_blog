@extends('layouts.app')

@section('content')

        @if (isset($articles))
        @foreach($articles as $article)
            @if($loop->first)
            
            <h1 style="text-align:center; border-bottom:1px solid; line-height:80px; padding-bottom:1.5rem">{{ $article->title }}</h1>
            <p style="width:50%; padding-left:5%; font-size:24px">{{ $article->content }}</p>
            <div class="centering" style="border:1px solid; height:30px; line-height:30px; width:50%">
                <p style="text-align:center; font-weight:bold">MESSAGE</p>
            </div>
            @endif
            <div class="centering" style="border:1px solid; width:50%; height:100px;">
                <div style="margin-top:5px; line-height:12px; height:12px;">
                    <p style="font-size:12px;">{{ $article->message_author }} {{ $loop->iteration }}樓</p>
                </div>
                <div style="margin-top:2px;">
                    <p style="font-size:22px;">{{ $article->message_content }}</p>
                </div>
                <div  style="text-align:right; font-size:12px;">
                @if (Auth::user()->name == $article->message_author)

                    <span><a href="/message/delete/{{ $article->id }}/{{ $article->message_id }}" class="active" style="font-family:verdana">刪除</a></span>
                @elseif (/*$role->roles != 'normal' ||*/ Auth::user()->name == $article->author)

                    <span><a href="" class="active" style="font-family:verdana">刪除</a></span>
                @else

                    <span style="visibility:hidden;"><a href="" class="active" style="font-family:verdana">刪除</a></span>
                @endif

                </div>
            </div>
        @endforeach

            <form style="text-align:center;font-family:verdana" method="POST" action="/message/{{ $article->message_article_id }}">
            
            @csrf

                <p class="chinese" style="font-size:20px;">Leave message</p>
                <textarea name="content" id="content" rows="5" cols="30"></textarea>
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </form>
        @endif

@endsection