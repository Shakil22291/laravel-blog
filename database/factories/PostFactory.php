<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        return [
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => $slug,
            'body' => $this->faker->text(500)
        ];
    }
}
