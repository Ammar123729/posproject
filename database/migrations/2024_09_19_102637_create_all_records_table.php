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
        Schema::create('all_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_credit');
            $table->foreign('sale_credit')->references('id')->on('sales');
            $table->unsignedBigInteger('sale_cash');
            $table->foreign('sale_cash')->references('id')->on('sales');
            $table->unsignedBigInteger('purchase_credit');
            $table->foreign('purchase_credit')->references('id')->on('purchases');
            $table->unsignedBigInteger('purchase_cash');
            $table->foreign('purchase_cash')->references('id')->on('purchases');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_records');
    }
};
