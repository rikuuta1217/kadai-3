<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //　一時的に外部キー制約を無効化
        //　truncate(); =>全削除 + IDリセット
        //　DB::statement('SET FOREIGN_KEY_CHECKS=0;'); => 外部キー制約オフ
        //  DB::statement('SET FOREIGN_KEY_CHECKS=1;'); => 外部キー制約オン
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Weight_log::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::factory()->create([
            'id' => 1,
            'email' => 'demo@icloud.com',
            'password' => bcrypt('password'),
        ]);
    }
}
