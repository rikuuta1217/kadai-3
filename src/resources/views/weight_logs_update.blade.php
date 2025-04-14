@extends('layouts.app')
@section('title','新規体重更新画面')
@section('css')
@section('content')

<main>
<div class="create-form__content">
    <div class="create-form__title">
        <h1>Weight Log</h1>
    </div>
    <!-- $weight_log->id => 更新先にweight_logのIDを送信 -->
    <form method="POST" action="{{ route('update.weight_logs', $weight_log->id) }}" >
        @csrf
        <!-- @method('PUT')updateフォーム入力用 -->
        @method('PUT')

        <!-- 日付フォーム -->
        <label class="label">日付<span class="require">必須</span></label>
            <!-- value="{{ $weight_log->date }}" => dateの入力を表示 -->
            <input type="date" name="date" class="date" value="{{ $weight_log->date }}" >
            @error('date') <p class="error">{{ $message }}</p> @enderror

        <!-- 体重フォーム -->
        <label class="label">体重<span class="require">必須</span></label>
            <input type="text" name="weight" class="weight" value="{{ $weight_log->weight }}" >kg
            @error('weight') <p class="error">{{ $message }}</p> @enderror

        <!-- 摂取カロリーフォーム -->
        <label class="label">摂取カロリー<span class="require">必須</span></label>
            <input type="text" name="calories" class="calories" value="{{ $weight_log->calories }}" >cal
            @error('calories') <p class="error">{{ $message }}</p> @enderror

        <!-- 運動時間 -->
        <label class="label">運度時間<span class="require">必須</span></label>
            <input type="time" name="exercise_time" class="exercise_time" value="{{ $weight_log->exercise_time }}" >
            @error('exercise_time') <p class="error">{{ $message }}</p> @enderror

        <!-- 運動内容 -->
        <label class="label">運動内容<span class="require">必須</span></label>
            <textarea cols="50" rows="5" name="exercise_content" placeholder="運動内容を追加" class="exercise_content"  >{{ old('exercise_content', $weight_log->exercise_content) }}</textarea>
            <!-- {{ old('') }} =>フォームで送信された値を最優先で表示、バリデーションエラー時に優先して表示 -->
            <!-- $weight_log->exercise_content => フォーム初表示時 -->
            @error('exercise_content') <p class="error">{{ $message }}</p> @enderror

        <!-- 登録・戻るボタン -->
        <div class="button-content">
            <a href="{{ route('index.weight_logs') }}" class="button-back">戻る</a>
            <button type="submit" class="button-register">更新</button>
        </div>
    </form>
</div>
</main>
@endsection
