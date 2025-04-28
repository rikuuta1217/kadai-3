<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightLogsTable extends Migration
{
    /**
     * 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_logs', function (Blueprint $table) {
            $table->id();
            //  foreignId('外部テーブルID') => ('外部テーブルID')を外部キーとして作成
            //  constrained() => 外部キーが参照するテーブル('外部テーブルID') を自動で推測して制約を設定する要素
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('date');               //日付
            //  decimal('',4,1) => 小数点の固定カラム
            //　最大4桁の数値を格納 / 小数点以下1桁を保tu
            $table->decimal('weight', 4, 1);    //体重
            $table->integer('calories')->nullable();                        //食事量
            $table->time('exercise_time')->nullable();                      //運動時間
            $table->text('exercise_content')->nullable();                   //運動内容
            $table->timestamps();
        });
    }

    /**s
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weight_logs');
    }
}
