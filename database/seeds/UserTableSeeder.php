<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'    =>  3,
            'name'    =>  'test',
            'email'    =>  'test@test.com',
            'password' => 'test1111',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'screen_name' => 'こうへい@エンジニア',
            'twitter' => 'kei_01011',
            'referral' => '大阪の制作会社でWebエンジニアしてます。1歳のじゃじゃ馬娘と妻の3人暮らし。仕事と育児を頑張るパパエンジニアです。',
            'profile_image' => '/images/user/user.png',
        ]);
    }
}
