<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //генерация тестовых данных
        DB::table('users')->truncate();
        DB::table('categories')->truncate();
        DB::table('posts')->truncate();
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(20)->create();
        \App\Models\Post::factory(30)->create();

        // $this->call(CategoriesTableSeeder::class);
        // $this->call(PostsTableSeeder::class);
    }
}
