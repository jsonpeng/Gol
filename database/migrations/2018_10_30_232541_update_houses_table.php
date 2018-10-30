<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateHousesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {

            if (!Schema::hasColumn('houses', 'plan_address')) {
                 $table->string('plan_address')->nullable()->comment('小屋计划书地址');
            }

            if (!Schema::hasColumn('houses', 'index_show')) {
                 $table->integer('index_show')->nullable()->default(0)->comment('首页展示 权数越高排序越靠前');
            }

            if (!Schema::hasColumn('houses', 'put_time')) {
                $table->string('put_time')->nullable()->comment('上架时间');
            }

      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
