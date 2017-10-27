<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class RemoveExtensionFromPastesTable
 */
final class RemoveExtensionFromPastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("pastes", function (Blueprint $table) {
            $table->dropColumn("extension");
        });
    }
}
