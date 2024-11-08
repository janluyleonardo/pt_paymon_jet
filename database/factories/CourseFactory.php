<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use League\CommonMark\Node\Block\Paragraph;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence();
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => $this->faker->paragraph(),
            'category_id' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'age_range_id' => $this->faker->randomElement(['1', '2', '3', '4']),
        ];
    }
}