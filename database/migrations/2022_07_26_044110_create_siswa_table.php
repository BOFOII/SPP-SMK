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
        Schema::create('siswa', function (Blueprint $table) {
            $table->char('nisn', 10)->primary();
            $table->char('nis');
            $table->string('nama', 35);
            $table->integer('kelas_id');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete("cascade");
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->foreignId('spp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
