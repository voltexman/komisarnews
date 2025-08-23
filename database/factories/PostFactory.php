<?php

namespace Database\Factories;

use App\Enums\PostCategories;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->sentence();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'body' => fake()->paragraph(50),
            'category' => PostCategories::ARTICLES,
            'is_published' => fake()->boolean(),
            'published_at' => fake()->dateTime(now()),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->addMedia(UploadedFile::fake()->image('test.jpg', 600, 600))
                ->toMediaCollection('posts');
        });
    }
}
