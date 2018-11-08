<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGolServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gol_services', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->comment('服务/设施名称');
            $table->string('group')->nullable()->default('基础设施')->comment('设施组 基础设施|卫浴设施|厨房设施|娱乐|周边|特色|其他服务
                ');
            $table->string('image')->nullable()->comment('服务设施logo');

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
        Schema::drop('gol_services');
    }
}
