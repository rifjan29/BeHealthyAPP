<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('type_id')->unsigned();
            $table->integer('authors_id')->unsigned();
            // $table->string('title', 50);
            $table->string('cover', 100)->nullable();
            $table->text('desc');
            $table->string('file',100)->nullable();
            $table->string('duration',100);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('authors_id')->references('id')->on('authors')->onDelete('restrict')->onUpdate('cascade');
            // $table->foreign('type_id')->references('id')->on('type')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content');
    }
}
