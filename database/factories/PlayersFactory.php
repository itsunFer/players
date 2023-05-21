<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Players;
use App\Models\Teams;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Players>
 */
class PlayersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'team_id' => Teams::pluck('id')->random(),
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Non-binary']),
            'date' => $this->faker->date,
        ];
    }
}
