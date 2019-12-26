<!-- black bar-->
<div style="float:left; background-color:black; height:825px; width:3%"></div>
<!-- right side bar-->
<div style="float:right; border:2px solid; height:800px; width:20%; margin-right:15%">
    <div style="text-align:center; padding-top:10px">
        <p style="font-size:24px" >Search Article</p>
    </div>
    <div style="text-align:center">
        <form style="border:1px solid; text-align:center; height:50px; width:100%" method="GET" action="/search">
            <textarea style="margin-top:10px; display:inline;" name="key" id="key" rows="1" cols="30"></textarea>
            &nbsp;
            <button style="margin-top:10px; position:absolute" class="button" type="submit">Search</button>
        </form>
    </div>
    <div style="text-align:center; padding-top:10px">
        <a style="font-size:24px" href="{{ route('article.create') }}">New Article</a>
    </div>
</div>