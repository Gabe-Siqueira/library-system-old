<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'usuário teste',
            'email' => 'teste@teste.com.br',
            'password' => bcrypt('1234'),
            'created_at' => now(),
        ]);
    }
}
