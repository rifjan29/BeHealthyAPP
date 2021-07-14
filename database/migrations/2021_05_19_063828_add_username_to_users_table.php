<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username',100)->after('name');
            $table->string('photos')->after('username')->nullable();
            $table->enum('gender',['L','P'])->after('photos');
            // $table->string('no_hp',100)->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn(['username','photos','gender']);
            //  $table->dropColumn('photos');
            //  $table->dropColumn('gender');
        });
    }
}
