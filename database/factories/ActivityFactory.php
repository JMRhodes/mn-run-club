<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'    => User::all()->random()->id,
            'date'       => $this->faker->dateTimeBetween('-1 year'),
            'type'       => $this->faker->randomElement(['race', 'run', 'walk', 'treadmill']),
            'distance'   => $this->faker->randomFloat(2, 1.00, 26.2),
            'finish_time'=> $this->faker->time('H:i:s'),
            'rating'     => $this->faker->numberBetween(0, 5),
            'notes'      => $this->faker->text(200),
        ];
    }
}
