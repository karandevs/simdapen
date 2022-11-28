<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->foreignId('pktgol_id');
            $table->foreignId('jabatan_id');
            $table->date('tgl_lahir');
            $table->date('tgl_masuk');
            $table->boolean('berkas_skcpns')->default(false);
            $table->boolean('berkas_skpns')->default(false);
            $table->boolean('berkas_skpktterakhir')->default(false);
            $table->boolean('berkas_skjabatan')->default(false);
            $table->boolean('berkas_kgbterakhir')->default(false);
            $table->boolean('berkas_karpeg')->default(false);
            $table->boolean('berkas_drp')->default(false);
            $table->boolean('berkas_skhukuman')->default(false);
            $table->boolean('berkas_dsk')->default(false);
            $table->boolean('berkas_suratnikah')->default(false);
            $table->boolean('berkas_akteanak')->default(false);
            $table->boolean('berkas_kpt')->default(false);
            $table->boolean('berkas_dpcp')->default(false);
            $table->boolean('berkas_ppk2thnterakhir')->default(false);
            $table->boolean('berkas_pasphoto')->default(false);
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
        Schema::dropIfExists('pegawais');
    }
}
