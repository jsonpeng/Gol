<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateGolsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gols', function (Blueprint $table) {

            if (!Schema::hasColumn('gols', 'hourse_type')) {
                $table->string('hourse_type')->nullable()->default('出租')->comment('房屋类型 出租|转让|出售');
            }

            if (!Schema::hasColumn('gols', 'services')) {
                $table->string('services')->nullable()->comment('服务设施 多个用,隔开');
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
