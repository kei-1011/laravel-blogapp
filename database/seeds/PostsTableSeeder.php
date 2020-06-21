<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            'テスト記事１',
            'テスト記事２',
            'テスト記事３',
        ];

        $bodys = [
            'テスト記事１のコンテンツテスト記事１のコンテンツテスト記事１のコンテンツテスト記事１のコンテンツ',
            'テスト記事２のコンテンツテスト記事２のコンテンツテスト記事２のコンテンツテスト記事２のコンテンツテスト記事２のコンテンツ',
            'テスト記事３のコンテンツテスト記事３のコンテンツテスト記事３のコンテンツテスト記事３のコンテンツテスト記事３のコンテンツテスト記事３のコンテンツ',
        ];

        for($i =0; $i < count($titles); $i++ ) {

            DB::table('posts')->insert([
                'user_id'   => 1,
                'body'  =>  $bodys[$i],
                'title' =>  $titles[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
