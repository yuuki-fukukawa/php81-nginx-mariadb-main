<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ViteのCSSファイルを読み込む -->
    @vite('resources/css/app.css')
</head>
<body>
    <header style="background-color: #1b72ca">
        <a href="{{route('posts.index')}}">
            <h1>インスタグラム風アプリ</h1>
        </a>
    </header>
    <div class="content">@yield('content')</div>
    <footer style="background-color: #1b72ca">
        <p>c 2023 インスタグラム風アプリ</p>
</footer>
</body>
</html>