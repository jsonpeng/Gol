<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachHousesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attach_houses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('house_id')->unsigned();
            $table->foreign('house_id')->references('id')->on('houses');

            $table->string('key')->comment('扩展类型 image图片 word文档 ppt excel等');
            $table->string('value')->comment('扩展的地址');


            $table->index(['id','created_at']);
            $table->index('house_id');

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
        Schema::drop('attach_houses');
    }
}
