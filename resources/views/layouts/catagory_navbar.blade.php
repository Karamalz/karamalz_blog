<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto" style="font-size:20px">
                <!-- Authentication Links -->
                <li class="nav-item @yield('nav_laravel')">
                    <a class="nav-link" href="/home">All</a>
                </li>
                <li class="nav-item @yield('nav_laravel')">
                    <a class="nav-link" href="/article/catagory/Laravel">Laravel</a>
                </li>
                <li class="nav-item @yield('nav_php')">
                    <a class="nav-link" href="/article/catagory/PHP">PHP</a>
                </li>
                <li class="nav-item @yield('nav_mysql')">
                    <a class="nav-link" href="/article/catagory/MySQL">MySQL</a>
                </li>
                <li class="nav-item @yield('nav_vuejs')">
                    <a class="nav-link" href="/article/catagory/Vuejs">Vuejs</a>
                </li>
                <li class="nav-item @yield('nav_cpp')">
                    <a class="nav-link" href="/article/catagory/c++">C++</a>
                </li>
                <li class="nav-item @yield('nav_else')">
                    <a class="nav-link" href="/article/catagory/Else">Else</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
