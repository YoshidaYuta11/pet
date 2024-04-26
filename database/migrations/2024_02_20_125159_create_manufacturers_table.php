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
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('str');
        });
        Schema::table('pets', function (Blueprint $table) {
            $table->unsignedBigInteger('manufacturer')->nullable();
            $table->foreign('manufacturer')->references('id')->on('manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropForeign(['manufacturer']);
            $table->dropColumn('manufacturer');
        });

        Schema::dropIfExists('manufacturers');
    }
};
