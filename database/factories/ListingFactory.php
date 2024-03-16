<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = [
            'laravel', 'api', 'backend',
            'mysql', 'react', 'vue',
            'javascript', 'css',
            'frontend', 'php'
        ];
        $jobTags = [];
        do {
            foreach (range(0, rand(1, count($tags) - 1)) as $_) {
                $target = $tags[array_rand($tags)];
                if (!in_array($target, $jobTags, true)) {
                    $jobTags[] = $target;
                }
            }
        } while (count($jobTags) === 0);

        return [
            'title' => fake()->sentence(),
            'tags' => implode(',', $jobTags),
            'company' => fake()->company(),
            'location' => fake()->city(),
            'email' => fake()->companyEmail(),
            'website' => fake()->url(),
            'description' => fake()->paragraph(5),
        ];
    }
}
