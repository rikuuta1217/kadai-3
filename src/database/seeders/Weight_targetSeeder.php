<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Weight_log;
use App\Models\Weight_target;
use App\Models\User;

class Weight_targetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Weight_target::truncate();
        
        Weight_target::create([
            'user_id' => 1,
            'target_weight' => 58.0,
        ]);
    }
}

