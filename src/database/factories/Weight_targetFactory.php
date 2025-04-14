<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Weight_target;
use App\Models\User;

class Weight_targetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // randomFloat(1, 50, 75) => ランダムに数字を登録するかｍすう
            // (1[小数点1桁代で入力],50,75[指定した数字の範囲でランダムな小数値が設定される] )
            'target_weight' => $this->faker->randomFloat(1, 50, 75),
            'user_id' => User::factory(),
        ];
    }
}


