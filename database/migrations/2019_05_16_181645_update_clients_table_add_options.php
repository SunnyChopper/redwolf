<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClientsTableAddOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function(Blueprint $table) {
            $table->integer('rep_id');
            $table->integer('website_dev')->default(0);
            $table->integer('website_dev_employee_id')->default(0);
            $table->integer('marketing')->default(0);
            $table->integer('marketing_employee_id')->default(0);
            $table->integer('branding')->default(0);
            $table->integer('branding_employee_id')->default(0);
            $table->integer('content_curation')->default(0);
            $table->integer('content_curation_employee_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function(Blueprint $table) {
            $table->dropColumn('rep_id');
            $table->dropColumn('website_dev');
            $table->dropColumn('website_employee_id');
            $table->dropColumn('marketing');
            $table->dropColumn('marketing_employee_id');
            $table->dropColumn('branding');
            $table->dropColumn('branding_employee_id');
            $table->dropColumn('content_curation');
            $table->dropColumn('content_curation_employee_id');
        });
    }
}
