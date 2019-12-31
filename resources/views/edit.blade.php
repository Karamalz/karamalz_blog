@extends('layouts.app')

@section('content')
@if (isset($articles))
@foreach($articles as $article)
<form class="mt-3" method="POST" action="/article/update/{{ $article->id }}">
    @csrf

    <div class="field">
        <h3>Title</h3>
        <div class="control" style="padding-top:5px">
            <textarea name="title" id="title" rows="1" cols="50">{{ $article->title }}</textarea>
        </div>
        @if ($errors->has('title'))

            <span class="text-danger">{{ $errors->first('title') }}</span>
        @endif
        
    </div>
    <div class="field">
        <h3>Catagory</h3>
        <select name="catagory" id="catagory" style="width:93.5%;">
        @switch($article->catagory)
            @case('Laravel')

            <option value="Laravel" selected>Laravel</option>
            <option value="PHP">PHP</option>
            <option value="MySQL">MySQL</option>
            <option value="Vuejs">Vuejs</option>
            <option value="C++">C++</option>
            <option value="Else">Else</option>
                @break
            @case('PHP')
            
            <option value="Laravel">Laravel</option>
            <option value="PHP" selected>PHP</option>
            <option value="MySQL">MySQL</option>
            <option value="Vuejs">Vuejs</option>
            <option value="C++">C++</option>
            <option value="Else">Else</option>
                @break
            @case('MySQL')
            
            <option value="Laravel">Laravel</option>
            <option value="PHP">PHP</option>
            <option value="MySQL" selected>MySQL</option>
            <option value="Vuejs">Vuejs</option>
            <option value="C++">C++</option>
            <option value="Else">Else</option>
                @break
            @case('Vuejs')
            
            <option value="Laravel">Laravel</option>
            <option value="PHP">PHP</option>
            <option value="MySQL">MySQL</option>
            <option value="Vuejs" selected>Vuejs</option>
            <option value="C++">C++</option>
            <option value="Else">Else</option>
                @break
            @case('C++')
            
            <option value="Laravel">Laravel</option>
            <option value="PHP">PHP</option>
            <option value="MySQL">MySQL</option>
            <option value="Vuejs">Vuejs</option>
            <option value="C++" selected>C++</option>
            <option value="Else">Else</option>
                @break
            @case('Else')
            
            <option value="Laravel">Laravel</option>
            <option value="PHP">PHP</option>
            <option value="MySQL">MySQL</option>
            <option value="Vuejs">Vuejs</option>
            <option value="C++">C++</option>
            <option value="Else" selected>Else</option>
                @break
            @default
            <option value="Laravel">Laravel</option>
            <option value="PHP">PHP</option>
            <option value="MySQL">MySQL</option>
            <option value="Vuejs">Vuejs</option>
            <option value="C++">C++</option>
            <option value="Else">Else</option>
                @break
        @endswitch

        </select>
    </div>
    <div class="field" style="padding-top:5px">
        <h3>Content</h3>
        <div class="control" style="padding-top:5px">
            <textarea name="content" id="content" rows="10" cols="50">{{ $article->content }}</textarea>
        </div>
        @if ($errors->has('content'))

            <span class="text-danger">{{ $errors->first('content') }}</span>
        @endif

    </div>
    <input type="button" value="Cancel" onclick="location.href='/home'">
    <div class="field is-grouped">
        <div class="control">
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
@endforeach
@endif
@endsection
