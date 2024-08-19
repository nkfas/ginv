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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('barcode')->nullable();
            $table->string('name');
            $table->string('name_ar');
                       
            $table->unsignedBigInteger('vat_id');
            $table->decimal('vat_percent', 18, 2)->nullable();

            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
        Schema::table('stocks', function (Blueprint $table) {    
            $table->index('vat_id');
            $table->foreign('vat_id')->references('id')->on('vats');  
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
