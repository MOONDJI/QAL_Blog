<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    protected $categories = [
        [
            'name'=>'artisan',
            'description'=>'Artisan Category',
            'status'=>true,
        ],
        [
            'name'=>'laravel',
            'description'=>'Laravel Category',
            'status'=>false,
        ],
        [
            'name'=>'php',
            'description'=>'Php Category',
            'status'=>true,
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE categories');
        foreach ( $this->categories as $value ){
            DB::insert("INSERT INTO categories (name, description, status) VALUES ( ?, ?, ?)", [$value['name'], $value['description'], $value['status']]);
        }
    }
}
