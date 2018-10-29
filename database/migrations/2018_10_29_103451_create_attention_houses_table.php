<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttentionHousesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attention_houses', function (Blueprint $table) {
            $table->increments('id');

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
        Schema::drop('attention_houses');
    }
}
