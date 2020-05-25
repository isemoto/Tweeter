<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'follow_user_id' => 1,
            'followed_user_id' => 2,
        ];
        DB::table('Follows')->insert($param);

        $param = [
            'follow_user_id' => 1,
            'followed_user_id' => 3,
        ];
        DB::table('Follows')->insert($param);

        $param = [
            'follow_user_id' => 3,
            'followed_user_id' => 1,
        ];
        DB::table('Follows')->insert($param);
    }
}
