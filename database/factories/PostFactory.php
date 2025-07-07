<?php

namespace Database\Factories;

use App\Enums\PostCategories;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'slug' => fake()->slug(),
            'body' => fake()->paragraph(80),
            'category' => PostCategories::ARTICLES,
            'is_published' => fake()->boolean(),
            'published_at' => fake()->dateTime(now()),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Post $post) {
            $loremImage = 'https://picsum.photos/1024/768';
            $post->addMediaFromUrl($loremImage)->toMediaCollection('posts');
        });
    }
}
