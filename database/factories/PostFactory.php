<?php

namespace Database\Factories;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => self::factoryForModel('App\Models\User'),
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph

        ];
    }

}
