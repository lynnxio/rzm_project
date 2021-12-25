<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'),
            'user_id' => User::all()->random()->id,
            'qty' => mt_rand(0, 1000),
            'status_id' => Status::all()->random()->id,
        ];
    }
}
