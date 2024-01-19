<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logs')->truncate();
        DB::table('logs')->insert([
            [
                'id' => 1,
                'name' => 'ミエレ',
                'category' => 7,
                'visit_status' => '訪問済み',
                'score' => '5',
                'review' => '綺麗な海が見えるカフェ。ハンバーガーがボリューミーで、玉ねぎが甘かった。',
                'created_at' => '2023-09-01 12:11:11',
                'updated_at' => '2023-09-13 14:22:33'
            ],
            [
                'id' => 2,
                'name' => '幸せのパンケーキ',
                'category' => 7,
                'visit_status' => '訪問済み',
                'score' => '4',
                'review' => 'ふわふわのパンケーキがおいしかった。結構人が並んでるので行く時間はお昼時やおやつの時間は避けたほうがいい。',
                'created_at' => '2023-09-01 12:11:11',
                'updated_at' => '2023-09-13 14:22:33'
            ],
            
        ]);
    }
}
