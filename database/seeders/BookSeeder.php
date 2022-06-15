<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book')->insert([
            'title' => 'Como as coisas são...',
            'description' => 'Biografia da vida de Gabriel',
            'author' => 'Gabriel S. Nascimento',
            'number_pages' => 120,
            'registration_date' => now(),
            'created_at' => now(),
        ]);
    }
}
