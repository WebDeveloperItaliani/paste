<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class AddExtensionsColumnToLanguagesTable
 */
final class AddExtensionsColumnToLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("languages", function (Blueprint $table) {
            $table->text("extensions")->after("name");
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("languages", function (Blueprint $table) {
            $table->dropColumn("extensions");
        });
    }
}
