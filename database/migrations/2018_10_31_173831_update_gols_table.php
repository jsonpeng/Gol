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

            if (!Schema::hasColumn('gols', 'water_price')) {
                $table->float('water_price')->nullable()->default(0)->comment('水费');

                $table->float('electric_price')->nullable()->default(0)->comment('电费');

                $table->float('mei_price')->nullable()->default(0)->comment('煤费');

                $table->float('ranqi_price')->nullable()->default(0)->comment('燃气费');

                $table->float('service_price')->nullable()->default(0)->comment('服务费');

                $table->float('other_price')->nullable()->default(0)->comment('其他费用');
            }

            $table->string('zuqi_type')->nullable()->default('月')->comment('租期类型 月|季度|半年|整年');

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
