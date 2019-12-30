@extends('layouts.app')

@section('content')

<form class="mt-3" method="POST" action="/article/store">
    @csrf

    <div class="field">
        <h3>Title</h3>
        <div class="control" style="padding-top:5px">
            <textarea name="title" id="title" rows="1" cols="50"></textarea>
        </div>
    </div>
    <div class="field">
        <h3>Catagory</h3>
        <select name="catagory" id="catagory" style="width:93.5%;">
            <option value="Laravel">Laravel</option>
            <option value="PHP">PHP</option>
            <option value="MySQL">MySQL</option>
            <option value="Vuejs">Vuejs</option>
            <option value="C++">C++</option>
            <option value="Else">Else</option>
        </select>
    </div>
    <div class="field" style="padding-top:5px">
        <h3>Content</h3>
        <div class="control" style="padding-top:5px">
            <textarea name="content" id="content" rows="10" cols="50"></textarea>
        </div>
    </div>
    <input type="button" value="Cancel" onclick="location.href='/home'">
    <div class="field is-grouped">
        <div class="control">
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
@endsection
