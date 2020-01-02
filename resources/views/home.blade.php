@extends('layouts.app')

@section('content')
@if (isset($posts))
@include('flash::message')
    @foreach ($posts as $post)
    <div style="height:100px; margin-top:3%">
        <span class="article-title" style="text-align:left;font-size:28px; font-weight:bold; font-family:verdana"> <a href="/article/{{ $post->id }}" class="active">{{ $post->title }}</a></span>
        <p class="ellipsis" style="border-top:1px solid; padding-left:10%; font-family:verdana; font-size:20px;">{{ $post->content }}</p>
    </div>
    <div style="float:right">
        <span>分類：<a href="/article/catagory/{{ $post->catagory }}" class="active" style="font-family:verdana">{{ $post->catagory }}</a></span>
        &nbsp;
        <span>作者：<a href="/article/user/{{ $post->author }}" class="active" style="font-family:verdana">{{ $post->author }}</a></span>
        &nbsp;
        &nbsp;

        
        <form style="display:inline; text-align: center;" action="/article/{{ $post->id }}/edit" method="get">
        @csrf

            <button type="submit" name="edit" value="edit" class="btnbtn">Edit</button> 
        </form>
        &nbsp;
        <form style="display:inline; text-align: center;" action="/article/{{ $post->id }}/delete" method="post">
        @csrf

            <button type="submit" name="delete" value="delete" class="btnbtn">Delete</button> 
        </form>
    </div>
    @endforeach
@endif
@endsection
