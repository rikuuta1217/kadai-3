<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\NewUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('/layouts/app');
// });
// Route::get('/login', function () {
//     return view('auth/login');
// });


// Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('login');

// Route::middleware('auth')->group(function () {} ) => ログイン済みのみ表示されるルート
Route::post('/register', [NewUserController::class, 'storeUser']);
Route::post('/register2', [WeightController::class, 'storeWeight']);

Route::middleware('auth')->group(function () {

//　管理画面
Route::get('/weight_logs', [WeightController::class,'index'])->name('index.weight_logs');
//　新規体重登録
Route::get('register2', [WeightController::class, 'weight']);
//　新規入力画面
Route::get('/weight_logs/create', [WeightController::class,'create'])->name('create.weight_logs');
// 検索フォーム
Route::get('weight_logs/search', [WeightController::class, 'search'])->name('search.weight_logs');
// 体重変更ルート
Route::get('/weight_logs/goal_setting',[WeightController::class,'goal_edit'])->name('weight_logs.goal_edit');
//　詳細表示ルート
Route::get('/weight_logs/{id}', [WeightController::class,'show'])->name('show.weight_logs');
//　更新入力画面

//　{weight_log} => 送信されたidをアドレスに表示
Route::get('/weight_logs/{weight_log}/edit',[WeightController::class,'edit'])->name('edit.weight_logs');
//　更新入力処理ルート
Route::put('/weight_logs/{weight_log}/update',[WeightController::class,'update'])->name('update.weight_logs');
// 登録ルート
Route::post('/weight_logs/store',[WeightController::class,'store'])->name('store.weight_logs');
// 体重変更処理ルート
// putでdb更新できなかったので、一時的にpost送信
Route::post('/weight_logs/{id}/update',[WeightController::class,'goal_update'])->name('weight_logs.goal_update');
// 管理画面削除フォーム
Route::delete('/weight_logs/{id}',[WeightController::class, 'destroy'])->name('weight_logs.destroy');
// ログイン時のアカウント新規作成フォーム
// Route::get('/register-new',[ProfileController::class, 'registerCreate'])->name('register.new');
// // ログイン時のアカウント新規作成フォーム登録処理
// Route::post('/register-new',[ProfileController::class, 'registerStore'])->name('register.new_store');

});