<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateUsersSocialTable
 */
final class CreateUsersSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("users_social", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("provider")->index();
            $table->unsignedBigInteger("user_id")->index();
            
            $table->string("oauth_token");
            $table->string("oauth_secret")->nullable();
            $table->string("oauth_refresh")->nullable();
            $table->unsignedBigInteger("expires_in");
            
            $table->unsignedBigInteger("social_id");
            $table->string("nickname")->nullable();
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("avatar")->nullable();
            $table->timestamps();
            
            $table->foreign("user_id")->references("id")->on("users")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("users_social");
    }
}
