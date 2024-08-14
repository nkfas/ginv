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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->unsignedBigInteger('customer_deal_id')->comment('1 for customer, 2 for supplier');
            $table->unsignedBigInteger('customer_group_id')->nullable();
            $table->unsignedBigInteger('account_id')->nullable();

            $table->string('name');
            $table->string('name_ar');
            $table->string('commercial_name')->nullable();
            $table->string('commercial_name_ar')->nullable();
            $table->string('address')->nullable();
            $table->string('address_ar')->nullable();
           
            $table->string('phone_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();

            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->unsignedBigInteger('salesman_id')->nullable()->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();

            $table->string('cr_no')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('office_no')->nullable();
            
            $table->string('customer_name')->nullable()->nullable();
            $table->string('vat_reg_number')->nullable()->nullable();
            $table->string('country_code')->nullable()->nullable();
            $table->string('customer_identification_number')->nullable()->nullable();
            $table->string('city_name')->nullable()->nullable();
            $table->string('street_name')->nullable()->nullable();
            $table->string('building_no')->nullable()->nullable();
            $table->string('additional_no')->nullable()->nullable();
            $table->string('postal_zone')->nullable()->nullable();
            $table->string('city_subdivision_name')->nullable()->nullable();
            $table->string('country_subentity')->nullable()->nullable();

            $table->string('email')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
