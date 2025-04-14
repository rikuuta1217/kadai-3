<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <h1 class="header-logo">
                PiGLy
            </h1>
            <!-- 目標体重変更 / ログアウトフォーム -->
            <div class="weight-button">
                <a href="{{ route('weight_logs.goal_edit') }}" class="weight-target__change">目標体重設定</a>
                    <form class="logout" action="/logout" method="post">
                        @csrf
                    <button type="submit">ログアウト</button>
                    </form>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>