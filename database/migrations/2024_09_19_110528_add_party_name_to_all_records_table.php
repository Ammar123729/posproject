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
        Schema::table('all_records', function (Blueprint $table) {
            $table->unsignedBigInteger('party_name')->before('sale_credit');
            $table->foreign('party_name')->references('id')->on('add_parties');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all_records', function (Blueprint $table) {

            $table->dropForeign(['party_name']);
            $table->dropColumn('party_name');
        });
    }
};
