<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.com',
        ]);
        // ユーザーを50人作成
        User::factory(50)->create();

        $this->call([
        // カテゴリを10個作成
        // Category::factory(10)->create();
        CategorySeeder::class,
        ArticleSeeder::class,
        CommentSeeder::class,
        LikeSeeder::class,
        ]);
        // 投稿を100件作成
        // Article::factory(100)->create();

        // // コメントを200件作成
        // Comment::factory(200)->create();

        // // いいねを300件作成
        // Like::factory(300)->create();
    }
}
