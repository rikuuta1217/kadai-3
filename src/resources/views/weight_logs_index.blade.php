@extends('layouts.app')
@section('title','管理画面')
@section('css')
@section('content')

<main>
<div class = "weight-log-table">
    <div class="add-button">
    <!-- データを追加ボタン -->
        <a href="{{ route('create.weight_logs') }}" class="weight-log_create--button">データを追加</a>
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
                    <a href="{{ route('edit.weight_logs', $weight_log->id) }}">更新</a>
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
</main>
@endsection
