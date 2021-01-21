<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuDipinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_dipinjams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anggota_id')->unsigned();
            $table->bigInteger('buku_id')->unsigned();
            $table->timestamps();
            $table->foreign('anggota_id')->references('id')->on('anggotas')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_dipinjams');
    }
}
