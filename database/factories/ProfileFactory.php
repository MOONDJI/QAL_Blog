<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $users = Profile::pluck('id');
        $users = DB::table('users')->pluck('id');
        return [
            'user_id'=>$this->faker->randomElement($users),
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
