<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{
    public function toResponse($request)
    {
        // ログアウト後のページ遷移メソッド
        return redirect('/login'); // ← ログアウト後にログインページへリダイレクト
    }
}
