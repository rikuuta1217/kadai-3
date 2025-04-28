<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Weight_log;
use App\Models\Weight_target;
use App\Http\Requests\WeightLogCreateRequest;
use App\Http\Requests\WeightLogTargetRequest;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  新規体重登録メソッド
    public function weight()
    {
        return view('auth.register2');
    }

    //　新規体重登録保存
    public function storeWeight(Request $request)
    {
        $createdAt=now();
        $formattedDate=$createdAt->format('Y/m/d');
        $userId = Auth::id();

        Weight_log::create([
            'user_id' => $userId,
            'weight' => $request->weight,
            'date' => $formattedDate,
        ]);

        Weight_target::create([
            'user_id' => $userId,
            'target_weight' => $request->target_weight,
        ]);

        return redirect()->route('index.weight_logs');
    }

    //  管理画面メソッド
    public function index()
    {

        $userId = Auth::id(); // ログイン中のユーザーIDを取得
        // ログインユーザーの体重記録を最新順で8件ずつ取得 (ページネーション付き)
        $weight_logs = Weight_log::where('user_id', $userId)->orderBy('date', 'desc')->paginate(8);
        // dd($weight_logs);
        // 最新の体重記録 (1件)
        $latestWeightLog = Weight_log::where('user_id', $userId)->first();

        // 最新の目標体重 (1件)
        $weightTarget = Weight_target::where('user_id', $userId)->latest()->first();

        return view('weight_logs_index',compact('weight_logs', 'latestWeightLog', 'weightTarget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //　新規作成フォームメソッド
    public function create()
    {
        return view('weight_logs_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //　登録保存メソッド
    public function store(WeightLogCreateRequest $request)
    {
        //　バリデーション済みのデータを取得
        $data = $request->validated();
        //　仮ユーザーID(ダミーユーザー)を指定
        $user_id = Auth::id();
        //　weight_logs_create　から送信されたデータを$dataに代入
        $data = $request->all();
        // 'user_id' を指定した値に設定($user_id)
        $data['user_id'] = $user_id;
        //　入力した新規データ($data)をWeight_logモデルのテーブルに登録
        $product = Weight_log::create($data);

        return redirect()->route('index.weight_logs')->with('success','登録が完了しました。');
    }


    public function search(Request $request)
    {
        $userId = Auth::id();
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $weight_logs=Weight_log::with('user')->where('user_id', $userId)->DateSearch($startDate, $endDate)->Paginate(8)->appends([
            'start_date'=>$startDate,
            'end_date'=>$endDate
        ]);

        $latestWeightLog = Weight_log::where('user_id', $userId)->latest()->first();
        $weightTarget = Weight_target::where('user_id', $userId)->latest()->first();

        return view('weight_logs_index', compact('weight_logs', 'weightTarget', 'latestWeightLog', 'startDate', 'endDate'));
    }
    /**
     * Display the specified resource.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weightLogs = Weight_log::findOrFail($id);
        return view('weight_logs_detail', compact('weightLogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  更新フォームメソッド
    public function edit($id)
    {
        //　weight_logモデルからfindOrFail($id) => idのレコードを検索
        //　レコードが存在 => $weight_logにレコードを格納
        //　存在しない場合 => ModelNotFoundExceptionを表示 (error)
        //　findOrFailのメリット => データがない場合、エラーを返すので処理を強制的に停止できる。
        $weight_log = weight_log::findOrFail($id);
        return view('weight_logs_update',compact('weight_log'));
    }

    // 目標体重変更フォームメソッド
    public function goal_edit(Request $request)
    {
        $userId = Auth::id();
        $weight_target = Weight_target::where('user_id', $userId)->first();
        return view('weight_logs_goal_setting',compact('weight_target'));
    }


    // 目標体重アップデートメソッド
    public function goal_update(WeightLogTargetRequest $request, $id)
    {
        // $weight_target = Weight_target::findOrFail($id); => IDにあた る、weight_targetテーブルのレコードを取得 なければ404エラー
        // $weight_target->target_weight = $request->input('target_weight'); => フォームから送信されたtarget_weightの値を$weight_targetモデルのtarget_weightカラムに代入
        // $weight_target->save(); => dbに保存
        $weight_target = Weight_target::findOrFail($id);
        $weight_target->target_weight = $request->input('target_weight');
        //  ↳さらに詳しく!!
        //  $weight_target->target_weight => このモデルの目標体重に対してという意味
        //  $request->input('target_weight'); => weight_logs_goal_setting.blade.phpの<input name="target_weight"に入力した値を取得 / target_weightをinputで取得
        $weight_target->save();
        return redirect()->route('index.weight_logs')->with('success', '目標体重を更新しました' );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  更新登録メソッド
    public function update(WeightLogCreateRequest $request, $id)
    {
        $weight_log = Weight_log::findOrFail($id);
        // weight_logのテーブルから$fillableで登録されているカラムを## 1週目取得してdbに保存
        $weight_log->fill($request->all())->save();

        return redirect()->route('index.weight_logs')->with('success', '体重を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weightLogs = Weight_log::findOrFail($id);
        $weightLogs->delete();
        return redirect()->route('index.weight_logs')->with('success', 'データを削除しました');
    }
}
