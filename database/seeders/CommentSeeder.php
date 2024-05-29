<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'article_id' => 1,
                'comment' => 'これは素晴らしい記事です！',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'article_id' => 2,
                'comment' => 'とても有益な情報ありがとうございます。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
