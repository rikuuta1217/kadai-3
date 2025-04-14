<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Weight_log;  //　Weight_logモデル登録
use App\Models\User;        //　Userモデルをインポート

class Weight_logFactory extends Factory
{
    protected $model = Weight_log::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1,30,100),
            'calories' => $this->faker->numberBetween(500, 2500),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->realText(30),
        ];
    }
}
