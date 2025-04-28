<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Weight_log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     UserSeeder::class,
        //     Weight_logSeeder::class,
        //     Weight_targetSeeder::class,
        // ]);

        $this->call(UserSeeder::class);
        Weight_log::factory(35)->create();
    }
}
