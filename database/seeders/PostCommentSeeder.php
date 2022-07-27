<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $body = 'テスト文章です。';
        $dammy_comment = 'テストコメントです。';

        for ( $i = 1; $i <=10; $i++) {
            $post = new Post;
            $post->user_id = 1;
            $post->title = "$i.投稿";
            $post->body  = $body;
            $post->comment_count = $i;
            $post->category_id = 1;
            $post->save();

            $random_comment = mt_rand(3,10);
            for ($c =0; $c<$random_comment; $c++) {
                $comment = new Comment;
                $comment->commenter = 'テストコメンター';
                $comment->comment = $dammy_comment;

                $post->comments()->save($comment);
                $post->increment('comment_count');
            }
        }
        $category = new Category;
        $category->name = 'スポーツ';
        $category->save();
    }
}
