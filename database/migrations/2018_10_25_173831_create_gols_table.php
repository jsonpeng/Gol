<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGolsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('brief');
            $table->string('content');
            $table->string('xukezheng');
            $table->integer('zuqi');
            $table->float('area');
            $table->string('address');
            $table->string('hourse_status');
            $table->string('gaizao_status');
            $table->integer('publish_status');
            $table->float('price');
            $table->string('give_word');
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
        Schema::drop('gols');
    }
}
