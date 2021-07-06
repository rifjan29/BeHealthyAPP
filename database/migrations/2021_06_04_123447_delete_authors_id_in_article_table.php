<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteAuthorsIdInArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article', function (Blueprint $table) {
            $table->string('slug')->after('title');
            $table->foreignId('user_id')->after('slug');
            $table->dropForeign('article_authors_id_foreign');
            $table->dropColumn('authors_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');

        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article', function (Blueprint $table) {
        });
    }
}
