<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('videogame_id')->unsigned();
            $table->foreign('videogame_id')->references('id')->on('videogames')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['user_id', 'videogame_id']);

            $table->smallInteger('score')->nullable();
            $table->enum('status',['Jugando','Abandonado','Planeado','Completado','Inactivo'])->nullable();
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
        Schema::dropIfExists('lists');
    }
}
