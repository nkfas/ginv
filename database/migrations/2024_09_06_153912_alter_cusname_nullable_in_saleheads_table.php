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
        Schema::table('saleheads', function (Blueprint $table) {
            $table->string('cusname')->nullable()->change(); // Make 'cusname' nullable
        });
    }

    public function down(): void
    {
        Schema::table('saleheads', function (Blueprint $table) {
            $table->string('cusname')->nullable(false)->change(); // Revert back to not nullable if rolled back
        });
    }
};
