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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('kakaku');
            $table->integer('stock');
            $table->integer('shurui'); // 'shurui' カラムを追加
            $table->text('shosai');
            $table->string('manufacturer')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
