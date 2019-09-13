<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('lag_content');
            $table->integer('post_id');
            $table->integer('lang_id'); // id of languages
            $table->integer('lang_type'); //0: products; 1:categories
            $table->integer('lang_type_detail')->nullable(); //0:title(products); 1: description(products); 2: content(products); 3: name(categories)
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
        Schema::dropIfExists('translations');
    }
}
