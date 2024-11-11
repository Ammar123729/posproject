<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_payment_ins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('party_name');
            $table->foreign('party_name')->references('id')->on('add_parties');
            $table->integer('sale_credit')->nullable();
            $table->integer('sale_cash')->nullable();
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
        Schema::dropIfExists('sale_payment_ins');
    }
};
