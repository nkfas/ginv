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
        Schema::create('saleheads', function (Blueprint $table) {
            $table->id();
            $table->date('invdate');
            $table->string('invno');
            $table->integer('cus_id');
            $table->string('cuscode');
            $table->string('cusname');
            $table->decimal('total',18,2);
            $table->decimal('vat',18,2);
            $table->decimal('gtotal',18,2);          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saleheads');
    }
};
