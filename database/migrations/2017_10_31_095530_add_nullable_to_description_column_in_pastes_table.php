<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class AddNullableToDescriptionColumnInPastesTable
 */
final class AddNullableToDescriptionColumnInPastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("pastes", function (Blueprint $table) {
            $table->dropColumn("description");
        });
    
        Schema::table("pastes", function (Blueprint $table) {
            $table->text("description")->nullable()->after("code");
        });
    }
}
