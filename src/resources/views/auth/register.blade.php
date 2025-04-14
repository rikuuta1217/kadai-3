@extends('layouts.app2')
@section('title', '新規アカウント作成')
@section('content')
<main>
    <div class="register-form">
        <h1>新規アカウント作成</h1>

        <h2>STEP1 アカウント情報の登録</h2>

        <!-- @if (session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif -->

        <form method="POST" action="/register">
            @csrf

            <div>
                <label>名前</label>
                <input type="text" name="name" value="{{ old('name') }}" >
                @error('name') <p class="error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label>メールアドレス</label>
                <input type="email" name="email" value="{{ old('email') }}" >
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label>パスワード</label>
                <input type="password" name="password" >
                @error('password') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="form__button">
                <button type="submit" name="form__button-submit">登録</button>
            </div>
        </form>
            <div class="form-login__link" >
                <a class="login__button-submit" href="/login">ログインの方はこちら</a>
            </div>
    </div>
</main>
@endsection