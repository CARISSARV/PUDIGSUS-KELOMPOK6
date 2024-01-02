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

        Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('pengarang');
            $table->date('tahun_terbit');
            $table->string('deskripsi');
            $table->string('jenis');
            $table->string('cover');
            $table->string('audio');
            $table->string('file');
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
        Schema::dropIfExists('book');
    }
};
