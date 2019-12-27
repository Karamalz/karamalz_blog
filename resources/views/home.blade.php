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

        
        <form style="display:inline; text-align: center;" action="{{ route('article.edit', $post->id) }}" method="get">
        @csrf

            <button type="submit" name="delete" value="delete" class="btnbtn">Edit</button> 
        </form>
        &nbsp;
        <form style="display:inline; text-align: center;" action="{{ route('article.destroy', $post->id) }}" method="post">
        @csrf
        @method('DELETE')

            <button type="submit" name="delete" value="delete" class="btnbtn">Delete</button> 
        </form>
    </div>
    @elseif ($role->roles != 'normal')

        <form style="visibility:hidden; display:inline; text-align: center;" action="{{ route('article.edit', $post->id) }}" method="get">
        @csrf

            <button type="submit" name="delete" value="delete" class="btnbtn">Edit</button> 
        </form>
        &nbsp;
        <form style="display:inline; text-align: center;" action="{{ route('article.destroy', $post->id) }}" method="post">
        @csrf
        @method('DELETE')

            <button type="submit" name="delete" value="delete" class="btnbtn">Delete</button> 
        </form>
    </div>
    @else
    
        <form style="visibility:hidden; display:inline; text-align: center;" action="{{ route('article.edit', $post->id) }}" method="get">
        @csrf

            <button type="submit" name="delete" value="delete" class="btnbtn">Edit</button> 
        </form>
        &nbsp;
        <form style="visibility:hidden; display:inline; text-align: center;" action="{{ route('article.destroy', $post->id) }}" method="post">
        @csrf
        @method('DELETE')

            <button type="submit" name="delete" value="delete" class="btnbtn">Delete</button> 
        </form>
    </div>
    @endif
    @endforeach
    @endforeach
@endif
@endsection
