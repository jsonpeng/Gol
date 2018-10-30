<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateHouseJoinsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('house_joins', function (Blueprint $table) {
            $table->string('hetong')->nullable()->default('不需要')->comment('是否需要合同');

            $table->string('receive_man')->nullable()->comment('收件联系人');

            $table->string('receive_mobile')->nullable()->comment('收件电话');

            $table->string('receive_address')->nullable()->comment('收件地址');
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
