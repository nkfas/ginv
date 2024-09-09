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
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saleh_id'); 
            $table->unsignedBigInteger('stock_id'); 
            $table->string('barcode')->nullable();
            $table->decimal('uprice',18,2);
            $table->decimal('qty',18,2);
            $table->decimal('befordisc',18,2);
            $table->decimal('discp',18,2)->default(0);
            $table->decimal('discamt',18,2)->default(0);
            $table->decimal('afterdisc',18,2);
            $table->decimal('vatp',18,2)->default(0);
            $table->decimal('vatamt',18,2)->default(0);
            $table->decimal('aftervat',18,2);
            $table->decimal('manual_entry',18,2)->nullable();
            $table->integer('vat_id');
            $table->timestamps();
        });

        Schema::table('sale_items', function (Blueprint $table) {    
            $table->index('stock_id');
            $table->foreign('stock_id')->references('id')->on('stocks');  
            $table->index('saleh_id');
            $table->foreign('saleh_id')->references('id')->on('saleheads');        
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_items', function (Blueprint $table) {
            $table->dropForeign(['stock_id']);
            $table->dropForeign(['saleh_id']);
            $table->dropIndex(['stock_id']);
            $table->dropIndex(['saleh_id']);
        });

        Schema::dropIfExists('sale_items');
    }
};
