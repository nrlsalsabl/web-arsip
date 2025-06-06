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
        Schema::create('vendor_forms', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('core_of_business');
            $table->string('full_company_name');
            $table->string('npwd');
            $table->text('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('region');
            $table->string('country');
            $table->string('phone');
            $table->string('fax');
            $table->string('website');
            $table->string('state');
            $table->string('trading_term');
            $table->string('payment_term');
            $table->string('contact_name');
            $table->string('contact_position');
            $table->string('email_address');
            $table->string('mobile_number');
            $table->string('document_expiry_date');
            $table->enum('status',['active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_forms');
    }
};
