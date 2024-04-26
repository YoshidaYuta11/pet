<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pets', function (Blueprint $table) {
        $table->integer('stock')->default(0)->after('shosai'); // 在庫数を表す列を追加
    });
}

public function down()
{
    Schema::table('pets', function (Blueprint $table) {
        $table->dropColumn('stock'); // 在庫数を表す列を削除
    });
}

};
