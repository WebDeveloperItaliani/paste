<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class ChangeFileNameToNameInPastesTable
 */
final class ChangeFileNameToNameInPastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("pastes", function (Blueprint $table) {
            $table->renameColumn("file_name", "name");
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
            $table->renameColumn("name", "file_name");
        });
    }
}
