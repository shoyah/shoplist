<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLimitIdToLimitFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('limit_foods', function (Blueprint $table) {
        $table->integer('limit_id')->unsigned();    //unsigned()型で定義
        //'limit_id' は 'limitsテーブル' の 'id' を参照する外部キー

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('limit_foods', function (Blueprint $table) {
            //
        });
    }
}
