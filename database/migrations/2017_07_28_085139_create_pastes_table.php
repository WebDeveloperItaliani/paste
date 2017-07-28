<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

final class CreatePastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("pastes", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->uuid("uuid");
            $table->bigInteger("paste_id")->index()->nullable()->default(null);
            $table->bigInteger("user_id")->index()->nullable()->default(null);
            $table->string("file_name");
            $table->string("extension");
            $table->string("code");
            $table->text("description");
            $table->timestamps();
        
            $table->foreign("user_id")->references("id")->on("users")->onDelete("SET NULL")->onUpdate("CASCADE");
            $table->foreign("paste_id")->references("id")->on("pastes")->onDelete("SET NULL")->onUpdate("CASCADE");
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("pastes");
    }
}
