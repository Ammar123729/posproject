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
        Schema::create('item_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('party_name');
            $table->foreign('party_name')->references('id')->on('add_parties');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('add_items');
            $table->decimal('sale_quantity', 10, 2)->nullable(); // To store the cash sale amount
            $table->decimal('purchase_quantity', 10, 2)->nullable(); // To store the credit sale amount
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_data');
    }
};
