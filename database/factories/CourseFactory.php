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
            'category' => $this->faker->randomElement(['Desarrollo WEB', 'Diseño WEB', 'BIG-Data', 'Marketing-Digital']),
            'age_group' => $this->faker->randomElement(['5-8', '9-13', '14-16', '16+']),
        ];
    }
}
