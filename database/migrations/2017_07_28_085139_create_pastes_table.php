<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreatePastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->uuid("uuid");
            $table->bigInteger("user_id")->nullable()->default(null);
            $table->foreign("user_id")->references("id")->on("users")->onDelete("SET NULL")->onUpdate("CASCADE");
            $table->string("title");
            $table->string("code");
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
