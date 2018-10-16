<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHousesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->comment('小屋名称');

            $table->string('province')->nullable()->default(0)->comment('省');
            $table->string('city')->nullable()->default(0)->comment('市');
            $table->string('district')->nullable()->default(0)->comment('区');

         
            $table->float('lon')->nullable()->comment('经度');
            $table->float('lat')->nullable()->comment('纬度');

            $table->string('address')->comment('小屋地址');
            $table->string('image')->nullable()->comment('小屋主图');
            
            $table->string('content')->comment('小屋详情内容');
            $table->integer('view')->nullable()->default(0)->comment('浏览量');
            $table->float('gear')->comment('档位金额');
            $table->string('type')->comment('类型 青旅|客栈|民宿|空间');
            $table->float('target')->comment('目标金额');
            $table->string('status')->nullable()->default('审核中')->comment('发布状态 审核中|已发布|已完成');
            $table->string('endtime')->comment('截止时间');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['id','created_at']);
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
        Schema::drop('houses');
    }
}
