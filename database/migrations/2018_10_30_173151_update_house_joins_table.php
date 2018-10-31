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
            if (!Schema::hasColumn('house_joins', 'hetong')) {
                $table->string('hetong')->nullable()->default('不需要')->comment('是否需要合同');
            }

            if (!Schema::hasColumn('house_joins', 'receive_man')) {
                $table->string('receive_man')->nullable()->comment('收件联系人');
            }

            if (!Schema::hasColumn('house_joins', 'receive_mobile')) {
                $table->string('receive_mobile')->nullable()->comment('收件电话');
            }

            if (!Schema::hasColumn('house_joins', 'receive_address')) {
                $table->string('receive_address')->nullable()->comment('收件地址');
            }

            if (!Schema::hasColumn('house_joins', 'body')) {
                $table->string('body')->nullable()->comment('购买描述');
            }

            if (!Schema::hasColumn('house_joins', 'gear_num')) {
                $table->integer('gear_num')->nullable()->comment('购买档位数量');
            }

            if (!Schema::hasColumn('house_joins', 'gear')) {
                $table->double('gear')->nullable()->comment('购买档位金额');
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
