<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->integer('follow_user_id')->unsigned();
            $table->integer('followed_user_id')->unsigned();
            $table->timestamps();

//            // 外部キー設定（必要だったら）
//            $table->foreign('follow_user_id')->references('id')->on('users');
//            $table->foreign('followed_user_id')->references('id')->on('users');

            // プライマリキー設定
            $table->unique(['follow_user_id', 'followed_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
