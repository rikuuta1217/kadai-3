@extends('layouts.app')
@section('title','体重変更')
@section('css')
@section('content')

<main>
<div class="create-content__form">
    <div class="header=title">
        <h1>目標体重設定</h1>
    </div>

    <form method="POST" action="{{ route('weight_logs.goal_update', $weight_target->id) }}" >
    @csrf
    <!-- <input type="hidden" name="_method" value="PUT"> -->
        <div class="weight-text">
            <input type="text" name="target_weight" class="target_weight" value="{{ old('target_weight',$weight_target->target_weight) }}" >kg
            @error('weight') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="button-content">
            <a href="{{ route('index.weight_logs') }}" class="button-back">戻る</a>
            <button type="submit">更新</button>
        </div>

    </form>
</div>

</main>


@endsection

