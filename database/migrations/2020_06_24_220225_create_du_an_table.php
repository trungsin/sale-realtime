<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuAnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('du_an', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('ma');
            $table->string('ten',255);
            $table->string('anh_dai_dien',255)->nullable();
            $table->char('tinh_trang')->default('mo ban');
            $table->integer('so_phut_book_dat_cho')->default(12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('du_an');
    }
}
