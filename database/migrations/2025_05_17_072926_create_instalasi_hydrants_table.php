<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instalasi_hydrants', function (Blueprint $table) {
            $table->id();
            $table->string('kode');  // varchar for 'kode'
            $table->string('kapasitas');  // varchar for 'kapasitas'
            $table->string('pilar_hydrant');  // varchar for 'pilar_hydrant'
            $table->string('kontak_hydrant');  // varchar for 'kontak_hydrant'
            $table->string('selang');  // varchar for 'selang'
            $table->string('hose_reel');  // varchar for 'hose_reel'
            $table->string('pipa_pancar');  // varchar for 'pipa_pancar'
            $table->string('mesin_penggerak');  // varchar for 'mesin_penggerak'
            $table->string('pompa');  // varchar for 'pompa'
            $table->float('tekanan_kerja_max');  // float for 'tekanan_kerja_max'
            $table->string('no_ijin_pemakaian');  // varchar for 'no_ijin_pemakaian'
            $table->date('tanggal_berlaku_sd');  // date for 'tanggal_berlaku_sd'
            $table->date('tanggal_input');  // date for 'tanggal_input'
            $table->enum('status',['active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instalasi_hydrants');
    }
};
