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
        Schema::create('ga_archive_data', function (Blueprint $table) {
            $table->id();
            $table->string('no')->nullable();
            $table->string('filling_number');
            $table->string('cabinet_number');
            $table->string('document_name');
            $table->string('document_file');
            $table->string('date');
            $table->string('category');
            $table->boolean('is_generate_qrcode')->default(true);
            $table->string('unique_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ga_archive_data');
    }
};
