<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->comment('用户名');
            $table->string('email')->comment('邮箱');
            $table->string('password')->comment('密码');

            $table->string('head_image')->nullable()->comment('用户头像');
            $table->string('mobile')->nullable()->comment('手机');

            $table->timestamp('last_login')->nullable()->comment('最后登录日期');
            $table->string('last_ip')->nullable()->comment('最后登录IP');

            $table->string('des')->nullable()->comment('个人简介');
            $table->string('type')->nullable()->default('用户')->comment('用户 小屋新主 商户');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
