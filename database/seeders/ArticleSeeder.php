<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Piala Dunia',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'image' => 'image/piala_dunia.jpg'
        ]);

        DB::table('articles')->insert([
            'user_id' => 1,
            'category_id' => 2,
            'title' => 'Inflasi Dunia',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'image' => 'image/inflasi.jpg'
        ]);
    }
}
