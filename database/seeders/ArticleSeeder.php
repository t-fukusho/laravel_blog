<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Category::factory()->count(20)->create();
        DB::table('articles')->insert([
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'Laravel 8 新機能',
                'content' => 'Laravel 8には多くの新機能があります。',
                'is_variable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'category_id' => 1,
                'title' => 'PHP 8 リリース',
                'content' => 'PHP 8はパフォーマンスの向上と新機能が含まれています。',
                'is_variable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'category_id' => 3,
                'title' => 'PHP 8 リリース2',
                'content' => 'NEW PHP 8はパフォーマンスの向上と新機能が含まれています。',
                'is_variable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'category_id' => 4,
                'title' => 'testtteee',
                'content' => 'testeeeしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6,
                'category_id' => 1,
                'title' => 'testttqeqqe',
                'content' => 'testeqeqeしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 5,
                'title' => 'test5',
                'content' => 'test5',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'category_id' => 4,
                'title' => 'test4',
                'content' => 'test4',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'category_id' => 3,
                'title' => 'test5',
                'content' => 'testeqeqeしています。',
                'is_variable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6,
                'category_id' => 1,
                'title' => 'test6',
                'content' => 'test6',
                'is_variable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'testtt',
                'content' => 'testしています。',
                'is_variable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
