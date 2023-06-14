<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaylaterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paylater', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nasabahs');
            $table->integer('NIK');
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_nasabahs')->references('id')->on('nasabahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paylater');
    }
}
