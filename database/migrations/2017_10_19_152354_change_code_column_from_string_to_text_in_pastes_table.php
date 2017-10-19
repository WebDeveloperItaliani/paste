<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class ChangeCodeColumnFromStringToTextInPastesTable
 */
final class ChangeCodeColumnFromStringToTextInPastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("pastes", function (Blueprint $table) {
            $table->text("code")->change();
        });
    }
}
