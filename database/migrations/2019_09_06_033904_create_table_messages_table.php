<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('email', 255);
            $table->string('phone', 50);
            $table->text('content');
            $table->integer('product_id');
            $table->integer('user_id_from');
            $table->integer('user_id_from_type'); // 0: user ; 1: admin
            $table->integer('user_id_to');
            $table->integer('user_id_to_type');// 0: user ; 1: admin
            $table->tinyInteger('status'); //0: seen ; 1: deleted
            $table->boolean('approve');
            $table->integer('reply_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
