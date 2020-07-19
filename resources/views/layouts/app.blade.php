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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">サインアップ</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item mr-4">
                            <a class="nav-link post-create bg-primary" href="{{ route('posts.create') }}"><span class="far fa-edit mr-1"></span>投稿する</a>
                        </li>
                        {{-- <li class="nav-item">
                        <a id="username" data-id="{{ Auth::id() }}" data-name="{{ Auth::user()->name }}" class="nav-link" href="{{ route('author.profile',['user' => Auth::user()->name , 'user_id' => Auth::id()])}}">{{ Auth::user()->name }} <span class="caret"></span></a>
                        </li> --}}
                        <li class="nav-item account_menus mr-4">
                            <img id="account_menu" class="profile_image account_logo" src="/storage/images/user/{{Auth::user()->profile_image}}" alt="{{Auth::user()->screen_name}}">

                            <ul class="account_menu">
                                <li>
                                    <a href="{{ route('posts.archive',['user' => Auth::user()->name])}}">記事一覧</a>
                                </li>
                                <li>
                                    <a class="account_logo" href="{{ route('author.profile',['user' => Auth::user()->name , 'user_id' => Auth::id()])}}">プロフィール</a>
                                </li>
                                <li>
                                    <a href="{{route('setting.account')}}" class="account-settiong">プロフィール編集</a>
                                </li>
                                <li class="logout_menu">
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">ログアウト
                                </a>
                                </li>
                            </ul>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
