<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHouseJoinsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_joins', function (Blueprint $table) {
            $table->increments('id');
         
            $table->float('price')->comment('支持金额');
            $table->string('number')->nullable()->comment('支付订单号');

            $table->string('pay_status')->nullable()->default('未支付')->comment('支付状态 未支付|已支付');

            $table->string('pay_platform')->nullable()->default('支付宝')->comment('支付平台 支付宝|微信');

            $table->integer('house_id')->unsigned();
            $table->foreign('house_id')->references('id')->on('houses');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['id','created_at']);
            $table->index('house_id');
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
        Schema::drop('house_joins');
    }
}
