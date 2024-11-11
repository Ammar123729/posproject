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
        Schema::create('all_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('party_name');
            $table->foreign('party_name')->references('id')->on('add_parties');
            $table->decimal('sale_cash', 10, 2)->nullable(); // To store the cash sale amount
            $table->decimal('sale_credit', 10, 2)->nullable(); // To store the credit sale amount
            $table->decimal('purchase_cash', 10, 2)->nullable(); // For future purchases (if needed)
            $table->decimal('purchase_credit', 10, 2)->nullable(); // For future purchases (if needed)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_data');
    }
};
