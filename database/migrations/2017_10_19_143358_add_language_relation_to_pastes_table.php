<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class AddLanguageRelationToPastesTable
 */
final class AddLanguageRelationToPastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("pastes", function (Blueprint $table) {
            $table->bigInteger("language_id")->after("user_id")->unsigned()->index()->nullable()->default(null);
            $table->foreign("language_id")->references("id")->on("languages")->onDelete("SET NULL")->onUpdate("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("pastes", function(Blueprint $table) {
            $table->dropColumn("language_id");
        });
    }
}
