<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senadors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->string('partido',100)->nullable();
            $table->string('numero',3)->unique();
            $table->string('image', 100);
            $table->integer('votos');
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
        Schema::dropIfExists('senadors');
    }
};
