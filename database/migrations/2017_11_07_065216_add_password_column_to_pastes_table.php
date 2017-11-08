<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class AddPasswordColumnToPastesTable
 */
final class AddPasswordColumnToPastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("pastes", function (Blueprint $table) {
            $table->string("password")->nullable()->after("description");
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("pastes", function (Blueprint $table) {
            $table->dropColumn("password");
        });
    }
}
