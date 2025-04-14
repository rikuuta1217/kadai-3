<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use App\Http\Responses\RegisterViewResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse as RegisterViewResponseContract;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ログアウト後、ログイン画面に戻る
        $this->app->singleton(
        \Laravel\Fortify\Contracts\RegisterViewResponse::class,
        \App\Http\Responses\RegisterViewResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 新規ユーザーの登録処理
        Fortify::createUsersUsing(CreateNewUser::class);

        // 新規ユーザーの登録ファイル表示
        Fortify::registerView(function () {
            // if (auth()->check()) {
            //     // ログイン済み -> 別アカウント作成用
            //     return view('auth.register-new');
            // } else {
            //     // 未ログイン -> 通常の登録フォーム
            //     return view('auth.register');
            // }
            return view('auth.register');
        });

        // ログインページの表示
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // ログイン回数の制限
        RateLimiter::for('login', function (Request $request) {
        $email = (string) $request->email;

        return Limit::perMinute(10)->by($email . $request->ip());
        });
    }
}
