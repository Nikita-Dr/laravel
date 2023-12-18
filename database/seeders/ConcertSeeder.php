<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('concerts')->insert([
            'date' => "12-09-23",
            'town' => "Москва",
        ]);

        DB::table('concerts')->insert([
            'date' => "15-10-23",
            'town' => "Волгоград",
        ]);

        DB::table('concerts')->insert([
            'date' => "19-11-23",
            'town' => "Новосибирск",
        ]);
    }
}
