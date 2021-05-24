<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $levels = ['beginner','immediat','high'];
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(50),
            'rating' => $this->faker->numberBetween(1,5),
            'views' => $this->faker->numberBetween(1,100),
            'levels' => $levels[rand(0,2)],
            'hours' => $this->faker->numberBetween(1,50),
            'active' => $this->faker->boolean,
            'user_id' => $this->faker->numberBetween(1,10),
            'category_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
