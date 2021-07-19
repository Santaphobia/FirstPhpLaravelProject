<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title')Главная страница@show</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="container header">
            <a href="/">LOGO</a>
            <ul class="menu">

                @if($admin)
                    <li><a href="{{ route('admin.news.index') }}" class="menu_link">Новости</a></li>
                    <li><a href="{{ route('admin.news.create') }}" class="menu_link">Создать новость</a></li>
                    <li><a href="{{ route('admin.news.categories') }}" class="menu_link">Категории</a></li>
                    <li><a href="{{ route('admin.news.createCategories') }}" class="menu_link">Создать категорию</a></li>
                    <li><a href="{{ route('admin.users.index') }}" class="menu_link">Пользователи</a></li>
                    <li>
                        <a class="menu_link" href=""
                           onclick="event.preventDefault();
                                                     document.getElementById('parser-form').submit();">
                            Парсер
                        </a>
                        <form id="parser-form" action="{{ route('admin.parser.index') }}" method="POST" style="display: none;">
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('news.index') }}" class="menu_link">Категории новостей</a></li>
                    <li><a href="{{ route('feedback') }}" class="menu_link">Форма обратной связи</a></li>

                @endif

                @guest
                    <li><a class="menu_link" href="{{ route('login') }}">Войти</a></li>
                    <li><a href="{{ route('google.redirect') }}" class="menu_link">Google</a></li>
                    @if (Route::has('register'))
                        <li><a class="menu_link" href="{{ route('register') }}">Зарегестрироваться</a></li>
                    @endif
                @else
                    <li>
                            <a class="menu_link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Выйти
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>
                @endguest

            </ul>
        </div>
    </header>
    <div class="main">
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <footer>
            <div class="container">Новости 2020</div>
        </footer>
    </div>
</body>
</html>
