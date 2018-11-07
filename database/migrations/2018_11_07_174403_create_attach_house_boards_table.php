<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachHouseBoardsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attach_house_boards', function (Blueprint $table) {
            $table->increments('id');

            $table->string('content')->comment('回复内容');

            //回复的消息
            $table->integer('message_id')->unsigned();
            $table->foreign('message_id')->references('id')->on('house_boards');
            
            //发布人
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            //回复谁
            $table->integer('reply_user_id')->unsigned();
            $table->foreign('reply_user_id')->references('id')->on('users');

            $table->index(['id', 'created_at']);
            $table->index('message_id');
            $table->index('user_id');
            $table->index('reply_user_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attach_house_boards');
    }
}
