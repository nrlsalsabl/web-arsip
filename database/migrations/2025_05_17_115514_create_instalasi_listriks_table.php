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
        Schema::create('instalasi_listriks', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_arus');
            $table->string('jumlah_daya');
            $table->string('sumber_tenaga_listrik');
            $table->string('no_pengasahaan');
            $table->string('tanggal_berlaku');
            $table->string('tanggal_input');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instalasi_listriks');
    }
};
