<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShuruiColumnToPetsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->integer('shurui');  // 追加するカラム
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn('shurui');  // カラムの削除
        });
    }
}
