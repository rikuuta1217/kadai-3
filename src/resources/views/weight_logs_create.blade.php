@extends('layouts.app')
@section('title','新規体重登録画面')
@section('css')
@section('content')

<main>
<div class="create-form__content">
    <div class="create-form__title">
        <h1>Weight Logを追加</h1>
    </div>
    <form method="POST" action="/weight_logs/store" >
        @csrf
        <!-- 日付フォーム -->
        <label class="label">日付<span class="require">必須</span></label>
            <input type="date" name="date" class="date">
            @error('date') <p class="error">{{ $message }}</p> @enderror

        <!-- 体重フォーム -->
        <label class="label">体重<span class="require">必須</span></label>
            <input type="text" name="weight" class="weight">kg
            @error('weight') <p class="error">{{ $message }}</p> @enderror

        <!-- 摂取カロリーフォーム -->
        <label class="label">摂取カロリー<span class="require">必須</span></label>
            <input type="text" name="calories" class="calories">cal
            @error('calories') <p class="error">{{ $message }}</p> @enderror

        <!-- 運動時間 -->
        <label class="label">運度時間<span class="require">必須</span></label>
            <input type="time" name="exercise_time" class="exercise_time">
            @error('exercise_time') <p class="error">{{ $message }}</p> @enderror

        <!-- 運動内容 -->
        <label class="label">運動内容<span class="require">必須</span></label>
            <textarea cols="50" rows="5" name="exercise_content" placeholder="運動内容を追加" class="exercise_content"></textarea>
            @error('exercise_content') <p class="error">{{ $message }}</p> @enderror

        <!-- 登録・戻るボタン -->
        <div class="button-content">
            <a href="{{ route('index.weight_logs') }}" class="button-back">戻る</a>
            <button type="submit" class="button-register">登録</button>
        </div>
    </form>
</div>
</main>
@endsection
