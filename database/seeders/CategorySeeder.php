<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'user_id' => 1,
            'name' => 'Olahraga',
        ]);

        DB::table('categories')->insert([
            'user_id' => 1,
            'name' => 'Ekonomi',
        ]);
    }
}
