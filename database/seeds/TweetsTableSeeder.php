<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'message' => '今日忙しい',
            'user_id' => 1,
            'reply_id' =>0,
        ];
        DB::table('Tweets')->insert($param);

        $param = [
            'message' => '今日ひま',
            'user_id' => 1,
            'reply_id' =>0,
        ];
        DB::table('Tweets')->insert($param);

        $param = [
            'message' => 'おはよう',
            'user_id' => 2,
            'reply_id' =>0,
        ];
        DB::table('Tweets')->insert($param);

        $param = [
            'message' => 'こんにちは',
            'user_id' => 2,
            'reply_id' =>0,
        ];
        DB::table('Tweets')->insert($param);

        $param = [
            'message' => '暇です。user3のreply',
            'user_id' => 3,
            'reply_id' => 2,
        ];
        DB::table('Tweets')->insert($param);

        $param = [
            'message' => 'おやすみ',
            'user_id' => 3,
            'reply_id' =>0,
        ];
        DB::table('Tweets')->insert($param);

        $param = [
            'message' => 'さようなら',
            'user_id' => 1,
            'reply_id' =>0,
        ];

        DB::table('Tweets')->insert($param);

        $param = [
            'message' => 'さようなら',
            'user_id' => 2,
            'reply_id' =>7,
        ];
        DB::table('Tweets')->insert($param);

        $param = [
            'message' => 'さようなら',
            'user_id' => 3,
            'reply_id' =>7,
        ];
        DB::table('Tweets')->insert($param);
    }
}
