<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //　一時的に外部キー制約を無効化
        // //　truncate(); =>全削除 + IDリセット
        // //　DB::statement('SET FOREIGN_KEY_CHECKS=0;'); => 外部キー制約オフ
        // //  DB::statement('SET FOREIGN_KEY_CHECKS=1;'); => 外部キー制約オン
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \App\Models\Weight_log::truncate();
        // User::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // User::factory()->create([
        //     'id' => 1,
        //     'email' => 'demo@icloud.com',
        //     'password' => bcrypt('password'),

        // ]);

        // (模範回答)
            // ユーザ作成
            $user = [
                'name' => 'sample',
                'email' => 'hoge@example.com',
                // PWはハッシュ化
                'password' => Hash::make('hoge1234')
            ];
                // usersテーブルに追加
                    // insertでtableに追加
            DB::table('users')->insert($user);

            // 目標体重作成
            $weight_target = [
                'user_id' => 1,
                'target_weight' => 55.0
            ];
                // weight_targetテーブルに追加
            DB::table('weight_targets')->insert($weight_target);

            // 新規体重入力
            $weight_logs = [
                'user_id'=>1,
                'weight'=>52.0,
                'calories'=>1200,
                'exercise_time'=>'02:20:00',
                'date'=>'2025-01-15'
            ];

            DB::table('weight_logs')->insert($weight_logs);
    }
}


