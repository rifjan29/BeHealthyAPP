<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('authors_id')->unsigned();
            $table->string('title', 50)->unique();
            $table->string('cover', 200)->nullable();
            $table->text('desc');
            $table->timestamps();
            $table->foreign('authors_id')->references('id')->on('authors')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
