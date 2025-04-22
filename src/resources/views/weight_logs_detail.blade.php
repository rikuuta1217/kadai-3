@extends('layouts.app')
@section('title', '詳細画面')
@section('css')
@section('content')
<main>
    <h1>体重記録</h1>
        <table class="table">
            <tr>
                <th>日付:</th>
                <td>{{ $weightLogs->date }}</td>
            </tr>
            <tr>
                <th>体重:</th>
                <td>{{ $weightLogs->weight }}</td>
            </tr>
            <tr>
                <th>カロリー:</th>
                <td>{{ $weightLogs->calories }}</td>
            </tr>
            <tr>
                <th>運動時間:</th>
                <td>{{ $weightLogs->exercise_time }}</td>
            </tr>
            <tr>
                <th>運動内容:</th>
                <td>{{ $weightLogs->exercise_content }}</td>
            </tr>
        </table>

        <div class = "button">
            <a href = "{{ route('index.weight_logs') }}">戻る</a>
        </div>
</main>
@endsection