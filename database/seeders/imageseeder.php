<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class imageseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('image')->insert([
            'file_path' => "text.png",
            'name' => "t2",
        ]);
        DB::table('image')->insert([
            'file_path' => "test.png",
            'name' => "t3",
        ]);

        DB::table('sample')->insert([
            'file_path' => "test.mp3",
            'name' => "m1",
        ]);

        DB::table('sample')->insert([
            'file_path' => "sample-6s.mp3",
            'name' => "ms",
        ]);

    }
}
