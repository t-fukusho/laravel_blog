<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Category::factory()->count(10)->create();
        DB::table('categories')->insert([
            ['name' => 'ニュース'],
            ['name' => 'テクノロジー'],
            ['name' => 'エンターテインメント'],
            ['name' => 'スポーツ'],
            ['name' => '健康']
        ]);
    }
}
