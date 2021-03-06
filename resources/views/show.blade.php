@extends('layouts.app')

@section('content')

        @if (isset($articles))
        @foreach($articles as $article)
        @include('flash::message')
            <h1 style="text-align:center; border-bottom:1px solid; line-height:80px; padding-bottom:1.5rem">{{ $article->title }}</h1>
            <p style="width:50%; padding-left:5%; font-size:24px">{{ $article->content }}</p>
            <div class="centering" style="border:1px solid; height:30px; line-height:30px; width:50%">
                <p style="text-align:center; font-weight:bold">MESSAGE</p>
            </div>
            @if (isset($messages))
            @foreach($messages as $message)

            <div class="centering" style="border:1px solid; width:50%; height:100px;">
                <div style="margin-top:5px; line-height:12px; height:12px;">
                    <p style="font-size:12px;">{{ $loop->iteration }}樓 {{ $message->message_author }}</p>
                </div>
                <div style="margin-top:2px;">
                    <p style="font-size:22px;">{{ $message->message_content }}</p>
                </div>
                <div  style="text-align:right; font-size:12px;">
                <span><a href="/message/delete/{{ $article->id }}/{{ $message->message_id }}" class="active" style="font-family:verdana">刪除</a></span>
                </div>
            </div>
            @endforeach
            @endif

            <form style="text-align:center;font-family:verdana" method="POST" action="/message/{{ $article->id }}">       
            @csrf

                <p class="chinese" style="font-size:20px;">Leave message</p>
                <textarea name="content" id="content" rows="5" cols="30"></textarea>
                @if ($errors->has('content'))

                <p class="text-danger">{{ $errors->first('content') }}</p>
                @endif

                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </form>
        @endforeach
        @endif


@endsection