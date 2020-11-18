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
        // DB::statement("SET FOREIGN_KEY_CHECKS=0"); //остановка связей

        // DB::table('users')->truncate();
        // DB::table('categories')->truncate();
        // DB::table('posts')->truncate();
        // DB::table('post_tag')->truncate();
        // DB::table('profiles')->truncate();

        // DB::statement("SET FOREIGN_KEY_CHECKS=1");
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(20)->create();
        \App\Models\Post::factory(30)->create();
        \App\Models\Profile::factory(10)->create();
        \App\Models\Tag::factory(30)->create();

        // $this->call(CategoriesTableSeeder::class);
        // $this->call(PostsTableSeeder::class);
    }
}
