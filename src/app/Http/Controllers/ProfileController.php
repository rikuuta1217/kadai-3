<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    // クラスのインスタンスを作成する要素
use App\Actions\Fortify\CreateNewUser;

class ProfileController extends Controller
{
    // // ログイン中の新規アカウント作成フォーム
    // public function registerCreate()
    // {
    //     return view('auth/register-new');
    // }

    // ログイン中の新規アカウント作成フォームの登録処理
    // public function registerStore(Request $request)
    // {
    //     // app() => 引数にクラス名があると解決してくれる
    //     // create() => $request->all()から送られた入力フォームをcreateで作成
    //     app(CreateNewUser::class)->create($request->all());
    //     return redirect()->route('index.weight_logs')->with('status','新しいアカウントを作成しました。');
    // }
}
