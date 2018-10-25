<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGolsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gols', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->comment('小屋名称');
            $table->string('image')->nullable()->comment('主图');
            $table->string('brief')->nullable()->comment('简介');
            $table->string('content')->comment('详情描述');
            $table->string('xukezheng')->nullable()->comment('有无许可证 有的话给许可证的地址');
            $table->float('zuqi')->nullable()->comment('租期 整租*年可续约');
            $table->float('area')->comment('建筑面积');
            $table->string('address')->comment('房子地址');

            $table->string('type')->comment('类型 青旅|客栈|民宿|空间');

            $table->string('hourse_status')->nullable()->default('闲置')->comment('房屋状态 闲置|已出租|已出售|已转让');
            $table->string('gaizao_status')->nullable()->default('轻微')->comment('轻微/中等');
            $table->integer('publish_status')->nullable()->default(0)->comment('0审核中1已发布');

            $table->float('price')->comment('房子价格');
            $table->string('give_word')->nullable()->comment('留给小屋新主的话');

            $table->string('province')->nullable()->default(0)->comment('省');
            $table->string('city')->nullable()->default(0)->comment('市');
            $table->string('district')->nullable()->default(0)->comment('区');

         
            $table->float('lon')->nullable()->comment('经度');
            $table->float('lat')->nullable()->comment('纬度');

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
        Schema::drop('gols');
    }
}
