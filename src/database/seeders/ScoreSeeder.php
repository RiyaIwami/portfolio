<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->delete();
        
        DB::table('scores')->insert([
            [
            'id'      => 1,
            'sort_no' => 1,
            ],
            [
            'id'      => 2,
            'sort_no' => 2,
            ],
            [
            'id'      => 3,
            'sort_no' => 3,
            ],
            [
            'id'      => 4,
            'sort_no' => 4,
            ],
            [
            'id'      => 5,
            'sort_no' => 5,
            ],
        ]);
    }
}
