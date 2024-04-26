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
        Schema::create('shuruis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('str');
        });
        Schema::table('pets', function (Blueprint $table) {
            $table->unsignedBigInteger('shurui')->nullable();
            $table->foreign('shurui')->references('id')->on('shuruis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropForeign(['shurui']);
            $table->dropColumn('shurui');
        });

        Schema::dropIfExists('shuruis');
    }
};
