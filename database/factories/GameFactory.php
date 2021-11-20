<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        return [
            'level' => random_int(0,3),
            'date' => $this->faker->date('2021-12-d'),
            'time' => $this->faker->time(random_int(8,18) . ':00:00'),
            'owner_id' => random_int(1,11),
            'field_id' => random_int(1,3),
        ];
    }
}
