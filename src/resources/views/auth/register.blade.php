@extends('layouts.app2')
@section('title', '新規アカウント作成')
@section('content')
<main>
    <div class="register-form">
        <div class="register-form__heading">
            <h2>新規会員登録</h2>

            <h3>STEP1 アカウント情報の登録</h3>
        </div>
        <!-- @if (session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif -->

        <form method="POST" action="/register">
            @csrf

            <div>
                <label>名前</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="名前を入力">
                @error('name') <p class="error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label>メールアドレス</label>
                <input type="email" name="email" value="{{ old('email') }}"
                placeholder="名前を入力">
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label>パスワード</label>
                <input type="password" name="password" placeholder="名前を入力">
                @error('password') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="form__button">
                <button type="submit" name="form__button-submit">次に進む</button>
            </div>
        </form>
            <div class="form-login__link" >
                <a class="login__button-submit" href="/login">ログインの方はこちら</a>
            </div>
    </div>
</main>
@endsection