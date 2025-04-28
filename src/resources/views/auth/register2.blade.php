@extends('layouts.app2')
@section('title','新規体重登録')
@section('content')
<!-- 新規体重データ入力 -->
<main>
    <div class="register-form">
        <div class="register-form__heading">
            <h2>新規会員登録</h2>

            <h3>STEP2 体重データの登録</h3>
        </div>
    <form method="POST" action="/register2">
        @csrf

        <div>
            <label>現在の体重</label>
            <input type="text" name="weight" value="{{ old('weight') }}" placeholder="現在の体重を入力">
            <span>kg</span>
            @error('weight') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>目標の体重</label>
            <input type="text" name="target_weight" value="{{ old('weight') }}" placeholder="目標の体重を入力">
            <span>kg</span>
            @error('weight') <p class="error">{{ $message }}</p> @enderror
        </div>
        <div class="form-button">
            <button class="form-button__submit">アカウント作成</button>
        </div>
    </form>
    </div>
</main>
@endsection