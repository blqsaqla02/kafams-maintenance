<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


    //    DB::table('users')->insert([
    //         'name' => 'student',
    //         'email' => 'student@gmail.com',
    //         'type' => 'student',
    //         'password' => bcrypt('1234')
    //     ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'type' => 'admin',
            'password' => bcrypt('secret')
        ]);

        // DB::table('users')->insert([
        //     'name' => 'parent',
        //     'email' => 'parent@gmail.com',
        //     'type' => 'parent',
        //     'password' => bcrypt('1234')
        // ]);
    }
}
