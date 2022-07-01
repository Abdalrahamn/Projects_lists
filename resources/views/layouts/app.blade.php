<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', '')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .btn-delete{
        background: url("/myProject/public/images/trash.svg");
        background-repeat:no-repeat;
        background-size:1.1rem 1.1rem;
        padding-top: 0;
        padding-bottom: 0;
        padding-right:5px;
        border: 0;
        outline: none;
    }
    .mr-2{
        padding: 8px;
        margin-right: px;
    }
    .list-checked{
        margin-right: 95px;
    }
    .custom-select{
        width: 100%;
        height: 30px;
    }
    .btn{
        margin : 10px 0px 10px 10px;
    }
    .checkted{
        margin-left: 660px;
        margin-bottom: 10px;
        width: 20px;
        margin-top: -16px;
    }
    .delete{
        margin-left: 700px;
        margin-top: -26px;
    }
    .bodytask{
        margin: 7px 0 0 7px;
    }
    .checked{
        text-decoration: line-through;
    }
    .dropdown-toggle::after{
        content: none; 
    }
    .user-image{
        width: 80px;
        height: 80px;
        padding: 5px;
        border-radius: 45px;
    }
    .btn-info {
    color: #fff;
    background-color: #2a7af1;
    border-color: #2a7af1;
    }
    button{
        width: 80px;
    }
    .card-head{
        height: 230px;
    }
    .text-desc{
        height: 73px;
    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/projects') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <img class="user-image" src="{{asset('/storage/' . auth()->user()->image)}}" >
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a href="/myProject/public/profile" class="dropdown-item">profile</a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
            
        </main>
    </div>
</body>
</html>
