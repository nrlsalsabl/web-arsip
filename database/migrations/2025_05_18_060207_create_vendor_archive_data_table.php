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
        Schema::create('vendor_archive_data', function (Blueprint $table) {
            $table->id();
            $table->string('no')->nullable();
            $table->string('filling_number');
            $table->string('cabinet_number');
            $table->string('document_number');
            $table->string('file_document');
            $table->string('date');
            $table->string('company_name');
            $table->boolean('is_generate_qrcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_archive_data');
    }
};
