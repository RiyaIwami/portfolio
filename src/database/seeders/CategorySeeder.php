<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * データベースシードの実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert([
            [
            'id'      => 1,
            'name'    => '和食',
            'sort_no' => 1,
            ],
            [
            'id'      => 2,
            'name'    => '中華',
            'sort_no' => 2,
            ],
            [
            'id'      => 3,
            'name'    => '洋食',
            'sort_no' => 3,
            ],
            [
            'id'      => 4,
            'name'    => 'フレンチ、イタリアン',
            'sort_no' => 4,
            ],
            [
            'id'      => 5,
            'name'    => '創作料理',
            'sort_no' => 5,
            ],
            [
            'id'      => 6,
            'name'    => '居酒屋',
            'sort_no' => 6,
            ],
            [
            'id'      => 7,
            'name'    => '韓国料理',
            'sort_no' => 7,
            ],
            [
            'id'      => 8,
            'name'    => 'エスニック料理',
            'sort_no' => 8,
            ],
            [
            'id'      => 9,
            'name'    => 'バー',
            'sort_no' => 9,
            ],
            [
            'id'      => 10,
            'name'    => 'カフェ、喫茶店',
            'sort_no' => 10,
            ],
            [
            'id'      => 11,
            'name'    => 'その他',
            'sort_no' => 11,
            ],
        ]);
    }
}
