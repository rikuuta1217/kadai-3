@extends('layouts.app')
@section('title','管理画面')
@section('css')
@section('content')

<main>
<div class = content>
    <!-- 体重表示フォーム -->
    <div class="heading">
        <div class="weight-log__summary">
            <p class="weight-summary__label">目標体重</p>
            <div class="weight-summary__value">
                {{ $weightTarget->target_weight }}
                <span class="weight-log__kg">kg</span>
            </div>
        </div>
        <div class="weight-log__summary">
            <p class="weight-summary__label">目標まで</p>
            <div class="weight-summary__value">
                {{ $weightTarget->target_weight - $latestWeightLog->weight }}
                <span class="weight-log__ka">kg</span>
            </div>
        <div class="weight-log__summary">
            <p class="weight-summary__label">最新体重</p>
            <div class="weight-summary__value">
                {{ $latestWeightLog->weight }}
                <span class="weight-log__kg">kg</span>
            </div>
        </div>
    </div>

    <div class = "weight-log-table">

    <!-- 検索フォーム -->
        <div class="weight-log__menu">
            <form action="{{ route('search.weight_logs')}}" class="weight-log__form" method="get">
                @csrf
                <!-- 検索日付 -->
                <div class="weight-form__search">
                    <input type="date" class="weight-form__search-input" name="start_date" value="{{ old('start_date', request('start_date')) }}">
                </div>

                <span class="calender-between">～</span>

                <div class="weight-form__search">
                    <input type="date" class="weight-form__search-input" name="end_date" value="{{ old('end_date', request('end_date')) }}">
                </div>

                <!-- 検索ボタン -->
                <button type="submit" class="weight-form__search--button">検索</button>

                <!-- リセット -->
                @if(request('start_date') || request('end_date'))
                <div class="weight-form__reset">
                    <a href="{{ route('index.weight_logs') }}" class="weight_form__reset-button">リセット</a>
                </div>
                @endif
            </form>

                <!-- データを追加ボタン -->
                <div class="add-button">
                    <a href="{{ route('create.weight_logs') }}" class="weight-log_create--button">データを追加</a>
                </div>
        </div>

        <!-- 項目をテーブルで表示 -->
        <table class = "table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <!-- 更新ボタン列 -->
                    <th></th>
                </tr>
            </thead>

            <!-- データをforeachで順番に表示する -->
            <tbody>
            @foreach($weight_logs as $weight_log)
                <tr>
                    <td>{{ $weight_log->date }}</td>
                    <td>{{ $weight_log->weight }}</td>
                    <td>{{ $weight_log->calories }}</td>
                    <td>{{ $weight_log->exercise_time }}</td>

                    <!-- 更新ボタン表示 -->
                    <!-- 更新ページ遷移 / $weight_log->id => データのIDをURLに表示 -->
                    <td>
                        <a href = "{{ route('show.weight_logs', $weight_log->id) }}">詳細</a>
                        <a href = "{{ route('edit.weight_logs', $weight_log->id) }}">更新</a>

                    <!-- 削除ホーム -->
                        <form action = "{{ route('weight_logs.destroy', $weight_log->id) }}" method = "POST" >
                        @csrf
                        @method('DELETE')
                        <button type = "submit" onclick="return confirm('本当に削除しますか?')">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- ページネーションのリンク -->
        <!-- weight_logs->links => ページネーション自動生成リンク -->
        <div class="pagination">
            {{ $weight_logs->links() }}
        </div>
    </div>
</div>
</main>
@endsection
