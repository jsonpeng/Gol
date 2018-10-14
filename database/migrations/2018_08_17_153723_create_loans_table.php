<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->comment('贷款名称');
            $table->string('image')->nullable()->comment('显示图片');
            $table->string('link')->nullable()->comment('第三方链接');
            $table->double('edu_qi')->nullable()->comment('起始额度');
            $table->double('edu_zhi')->nullable()->comment('额度止');
            $table->integer('qixian_qi')->nullable()->comment('起始期限');
            $table->integer('qixian_zhi')->nullable()->comment('终止期限');
            $table->enum('qixian_type',['日','月','年'])->nullable()->default('日')->comment('时间类型');
            $table->double('lilv')->nullable()->default(0)->comment('利率');
            $table->integer('num')->nullable()->default(0)->comment('申请人数');

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
        Schema::drop('loans');
    }
}
