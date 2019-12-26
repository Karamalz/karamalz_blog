@extends('layouts.app')

@section('content')
@if (isset($posts))
    @foreach ($posts as $post)
    @foreach ($roles as $role)
    <div style="height:100px; margin-top:3%">
        <span class="article-title" style="text-align:left;font-size:28px; font-weight:bold; font-family:verdana"> <a href="/article/{{ $post->id }}" class="active">{{ $post->title }}</a></span>
        <p class="ellipsis" style="border-top:1px solid; padding-left:10%; font-family:verdana; font-size:20px;">{{ $post->content }}</p>
    </div>
    <div style="float:right">
        <span>分類：<a href="/catagory/{{ $post->catagory }}" class="active" style="font-family:verdana">{{ $post->catagory }}</a></span>
        &nbsp;
        <span>作者：<a href="/user/{{ $post->author }}" class="active" style="font-family:verdana">{{ $post->author }}</a></span>
        &nbsp;
        &nbsp;
    @if (Auth::user()->name == $post->author)

        
        <span><a href="{{ route('article.edit', $post->id) }}" class="active" style="font-family:verdana">編輯</a></span>
        &nbsp;
        <span><a href="{{ route('article.destroy', $post->id) }}" class="active" style="font-family:verdana">刪除</a></span>
    </div>
    @elseif ($role->roles != 'normal')

        <span style="visibility:hidden;"><a href="{{ route('article.edit', $post->id) }}" class="active" style="font-family:verdana">編輯</a></span>
        &nbsp;
        <span><a href="{{ route('article.destroy', $post->id) }}" class="active" style="font-family:verdana">刪除</a></span>
    </div>
    @else
    
        <span style="visibility:hidden;"><a href="{{ route('article.edit', $post->id) }}" class="active" style="font-family:verdana">編輯</a></span>
        &nbsp;
        <span style="visibility:hidden;"><a href="{{ route('article.destroy', $post->id) }}" class="active" style="font-family:verdana">刪除</a></span>
    </div>
    @endif
    @endforeach
    @endforeach
@endif
@endsection
