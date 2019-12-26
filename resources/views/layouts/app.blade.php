<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('jquery/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        
        @include('layouts.navbar')
        @include('layouts.catagory_navbar')
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
        <div class="div-center mt-4" style="padding-left:15%">
            <div class="center" style="width:50%;border:1px solid;">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
        
    </div>
</body>
</html>
