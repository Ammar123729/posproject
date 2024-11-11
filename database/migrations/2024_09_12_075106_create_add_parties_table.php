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
        Schema::create('add_parties', function (Blueprint $table) {
            $table->id();
            $table->string('party_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->integer('opening_balance')->nullable();
            $table->date('date');
            $table->integer('credit_limit')->nullable();
            $table->string('fieldone')->nullable();
            $table->string('fieldtwo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_parties');
    }
};
