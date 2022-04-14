<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageBatDongSanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('bat_dong_san', function (Blueprint $table) {
            $table->string('img_cmnd_truoc',255)->nullable();
            $table->string('img_cmnd_sau',255)->nullable();
            $table->string('img_xac_nhan',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
