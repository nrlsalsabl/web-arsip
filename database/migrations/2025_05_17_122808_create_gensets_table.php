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
        Schema::create('gensets', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('jenis_alat');
            $table->string('nama_pabrik_pembuatan');
            $table->string('tempat_pembuatan');
            $table->string('nomor_pabrik_pembuatan');
            $table->string('daya');
            $table->string('no_pengesahan');
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
        Schema::dropIfExists('gensets');
    }
};
