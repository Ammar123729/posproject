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
        Schema::create('purchase_payment_outs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('party_name');
            $table->foreign('party_name')->references('id')->on('add_parties');
            $table->integer('purchase_credit')->nullable();
            $table->integer('purchase_cash')->nullable();
            $table->integer('add_payment');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_payment_outs');
    }
};
