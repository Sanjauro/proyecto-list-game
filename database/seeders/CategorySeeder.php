<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Acción',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Aventura',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Shooter',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Primera Persona',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Tercera Persona',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_videogame')->insert([
            'videogame_id' => '1',
            'category_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_videogame')->insert([
            'videogame_id' => '1',
            'category_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_videogame')->insert([
            'videogame_id' => '1',
            'category_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_videogame')->insert([
            'videogame_id' => '1',
            'category_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_videogame')->insert([
            'videogame_id' => '2',
            'category_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_videogame')->insert([
            'videogame_id' => '2',
            'category_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_videogame')->insert([
            'videogame_id' => '2',
            'category_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_videogame')->insert([
            'videogame_id' => '2',
            'category_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_videogame')->insert([
            'videogame_id' => '3',
            'category_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_videogame')->insert([
            'videogame_id' => '3',
            'category_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_videogame')->insert([
            'videogame_id' => '3',
            'category_id' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
