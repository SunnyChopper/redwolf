<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('username', 128);
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->integer('backend_auth')->default(0);
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
            $table->string('name');
            $table->dropColumn('username', 128);
            $table->dropColumn('first_name', 128);
            $table->dropColumn('last_name', 128);
            $table->dropColumn('backend_auth');
        });
    }
}
