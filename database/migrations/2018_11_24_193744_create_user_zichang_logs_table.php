<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserZichangLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_zichang_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->float('change')->comment('余额变动- +');
            $table->string('status')->nullable()->default('处理中')->comment('状态');
            $table->string('number')->nullable()->comment('编号');
            $table->string('type')->comment('转入/转出');

            $table->string('detail')->comment('详细描述');

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
        Schema::drop('user_zichang_logs');
    }
}
