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
        Schema::create('lain_lains', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama_perijinan');
            $table->string('no_perijinan');
            $table->string('di_terbitkan_oleh');
            $table->string('tanggal_dikeluarkan');
            $table->string('tanggal_berlaku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lain_lains');
    }
};
