<?php

namespace Database\Seeders;

use App\Models\Purchase;
use App\Models\Ratin;
use App\Models\User;
use App\Models\UserList;
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
        $this->call(VideogameSeeder::class);
        $this->call(CategorySeeder::class);
        User::factory(15)->create();
        DB::table('users')->insert([
            'name' => 'Santiago',
            'email' => 'santi@correo.com',
            'password' => bcrypt('12345678'),
            'address' => 'C/ Ultra',
            'rol' => 'admin'
        ]);
        //Ratin::factory(50)->create();
        Purchase::factory(20)->create();
        //UserList::factory(1)->create();
    }
}
