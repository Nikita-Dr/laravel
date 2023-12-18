<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class textseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('texts')->insert([
            'value' => "test_text",
            'name' => "test_name",
        ]);
        DB::table('texts')->insert([
            'value' => "weigjpweiogjpoijkkcx we[gok[sa sdfwe[tgi",
            'name' => "t1",
        ]);
    }
}
