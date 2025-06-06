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
        Schema::create('penyalur_petirs', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->string('jenis_penyalur_petir');        // required
            $table->string('radius_proteksi');              // required
            $table->string('panjang_bangunan');             // required
            $table->string('lebar_bangunan');               // required
            $table->string('tinggi_penyalur');              // required
            $table->string('bentuk_elektroda');             // required
            $table->string('alat_ukur');                    // required
            $table->string('pelaksana_pemasangan');         // required
            $table->date('tanggal_berlaku_sampai');         // required
            $table->date('tanggal_input')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyalur_petirs');
    }
};
