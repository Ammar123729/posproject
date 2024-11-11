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
        Schema::create('add_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->nullable();
            $table->string('item_category')->nullable();
            $table->string('item_image')->nullable();
            $table->string('item_code')->nullable();
            $table->string('item_unit')->nullable();
            $table->integer('item_saleprice')->nullable();
            $table->integer('item_purchaseprice')->nullable();
            $table->date('item_date')->nullable();
            $table->integer('item_quantity')->nullable();
            $table->integer('item_quantityprice')->nullable();
            $table->integer('item_minimumstock')->nullable();
            $table->string('item_address')->nullable();
            $table->integer('item_credit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_items');
    }
};
