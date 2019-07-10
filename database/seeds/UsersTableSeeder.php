<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'admin',
                'username' => 'admin24',
                'email' => 'admin24@gmail.com',
                'level' => 'admin',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'kepmas',
                'username' => 'kepmas7',
                'email' => 'kepmas07@gmail.com',
                'level' => 'kepmas',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
