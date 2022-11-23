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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->integer('id_pembayaran', true);
            $table->integer('petugas_id');
            // $table->foreign('petugas_id')->references('id_petugas')->on('petugas')->onDelete("cascade");
            $table->char('nisn', 10);
            // $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete("cascade");
            $table->dateTime('tgl_bayar');
            $table->string('bulan_bayar', 8);
            $table->string('tahun_bayar', 4);
            $table->integer('spp_id');
            // $table->foreign('spp_id')->references('id_spp')->on('spp')->onDelete("cascade");
            $table->bigInteger('jumlah_bayar');
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
        Schema::dropIfExists('pembayarans');
    }
};
