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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('party_name');
            $table->foreign('party_name')->references('id')->on('add_parties');
            $table->string('phone_number')->nullable();
            $table->string('invoice_number')->nullable();
            $table->date('date')->nullable();
            $table->enum('payment_method', ['Cash', 'Credit']);
            $table->string('cash_details')->nullable();
            $table->string('status')->default('Purchase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
