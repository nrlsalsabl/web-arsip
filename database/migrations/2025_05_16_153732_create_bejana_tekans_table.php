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
        Schema::create('bejana_tekans', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('jenis_pesawat');
            $table->string('tempat_pembuatan');
            $table->string('no_seri');
            $table->string('bentuk_bejana');
            $table->string('tekanan_kerja');
            $table->string('volume');
            $table->string('bahan_diisi');
            $table->string('no_izin_pemakaian');
            $table->string('tanggal_berlaku');
            $table->string('tanggal_input');
            $table->enum('status',['active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bejana_tekans');
    }
};
