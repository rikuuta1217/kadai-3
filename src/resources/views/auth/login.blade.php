@extends('layouts/app2')
@section('title','ログイン')
@section('css')
@section('content')
<!-- ログインフォーム -->
<main>
<div class="login">
        <h1 class="login-form__title">ログイン</h1>

        <!-- テキストエラー分 -->
        <!-- @if ($errors->any())
        <div class="login-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->

<!-- ログインコンテンツ -->
    <form class="login-form" method="POST" action="/login">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" >
            @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password" >
            @error('password') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-login__button">
            <button type="submit">ログイン</button>
        </div>
    </form>

    <div class="login-create">
        <a class="login-create__link" href="/register">アカウント作成はこちら</a>
    </div>
</div>
</main>
@endsection