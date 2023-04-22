<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicationAttachment>
 */
class ApplicationAttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['image', 'pdf']);
        $url = $this->faker->url();

        return [
            //
            'application_id' => rand(1, 99),
            'type' => $type,
            'url' => $url
        ];
    }
}