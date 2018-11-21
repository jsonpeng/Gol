<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShanghuCertsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shanghu_certs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable()->comment('商户名称');
            $table->string('work_image')->comment('营业执照图');
            $table->string('shop_image')->comment('店铺实图');

            $table->enum('status',['审核中','已通过','未通过'])->nullable()->default('审核中')->comment('审核状态');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['id', 'created_at']);
            $table->index('user_id');

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
        Schema::drop('shanghu_certs');
    }
}
