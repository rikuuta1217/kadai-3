<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Weight_log;

class Weight_logSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // IDを1から順番に登録
        Weight_log::truncate();
        // user_id 1 のユーザーに紐づくログを35件作成
        Weight_log::factory()->count(35)->create([
            'user_id' => 1
        ]);
    }
}