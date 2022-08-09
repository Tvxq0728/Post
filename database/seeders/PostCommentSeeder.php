<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\public\storage\image;
use Illuminate\Database\Seeders\store;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $body = 'テスト文章です。';
        // $dammy_comment = 'テストコメントです。';

        // for ( $i = 1; $i <=10; $i++) {
        //     $post = new Post;
        //     $post->user_id = 1;
        //     $post->title = "$i.投稿";
        //     $post->body  = $body;
        //     $post->comment_count = $i;
        //     $post->category_id = 1;
        //     $post->save();

        //     $random_comment = mt_rand(3,10);
        //     for ($c =0; $c<$random_comment; $c++) {
        //         $comment = new Comment;
        //         $comment->commenter = 'テストコメンター';
        //         $comment->comment = $dammy_comment;

        //         $post->comments()->save($comment);
        //         $post->increment('comment_count');
        //     }
        // }
        // $category = new Category;
        // $category->name = [
        //     'ファンタジー',
        //     'アクション',
        //     'コメディ',
        //     '恋愛',
        //     '日常',
        //     'スポーツ',
        //     'キッズ',
        // ];
        // $category->save();
        User::create([
            'name' => 'test',
            'email' => 'test@test',
            'password' => 'testtest',
        ]);
        Post::create([
            'user_id' => 1,
            'category_id' => 1,
            'image_id' => 1,
            'title' => 'test',
            'body'  => 'test',
        ]);
        $image = store('storage/app/public/image');
        $image = base64_encode(file_get_contents($image));
        Image::create([
            'image' => $image,
        ]);



        $param = [
            'name' => 'ファンタジー'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'name' => 'アクション'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'name' => 'コメディ'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'name' => '恋愛'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'name' => '日常'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'name' => 'スポーツ'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'name' => 'キッズ'
        ];
        DB::table('categories')->insert($param);
    }
}