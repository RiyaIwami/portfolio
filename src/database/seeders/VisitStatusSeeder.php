<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visit_statuses')->delete();

        DB::table('visit_statuses')->insert([
            [
            'id'      => 1,
            'name'    => '訪問済み',
            'sort_no' => 1,
            ],
            [
                'id'      => 2,
                'name'    => '未訪問',
                'sort_no' => 2,
            ],
        ]);
    }
}

