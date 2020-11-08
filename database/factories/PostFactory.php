<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\DB;

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
        $categories = DB::table('categories')->pluck('id');
        $users = DB::table('categories')->pluck('id');
        return [
            'title' => $this->faker->sentence($nbWords=6, $variableNbWords=true),
            'content' => $this->faker->paragraph($nbSentences=3, $variableNbSentences=true),
            'votes' => $this->faker->randomDigit,
            'status' => $this->faker->randomDigitNotNull,
            'category_id' => $this->faker->randomElement($categories),
            'user_id' => $this->faker->randomElement($users),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
