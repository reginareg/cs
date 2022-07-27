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
        Schema::create('autoservisas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('phone', 11);
            $table->string('address', 100);
            $table->unsignedBigInteger('paslauga_id');
            $table->foreign('paslauga_id')->references('id')->on('paslaugas');
            $table->unsignedBigInteger('mechanikas_id');
            $table->foreign('mechanikas_id')->references('id')->on('mechanikas');
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
        Schema::dropIfExists('autoservisas');
    }
};
