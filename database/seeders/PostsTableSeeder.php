<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    public $posts = [
        [
            'topic' => 'Programming',
            'description' => 'Php programming...',
            'category' => 'Php',
            'picture' => 'https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg'
        ],
        [
            'topic' => 'Codding',
            'description' => 'JS programming...',
            'category' => 'JavaScript',
            'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/1200px-Unofficial_JavaScript_logo_2.svg.png'
        ],
        [
            'topic' => 'Make Code',
            'description' => 'Python programming...',
            'category' => 'Python',
            'picture' => 'https://3dnews.ru/assets/external/illustrations/2017/08/25/957576/pyth.png'
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE posts');
        foreach($this->posts as $post){
            DB::insert('INSERT INTO posts (topic, description, category, picture) VALUES (?, ?, ?, ?)',
            [$post['topic'], $post['description'], $post['category'], $post['picture']]);
        }
    }
}
