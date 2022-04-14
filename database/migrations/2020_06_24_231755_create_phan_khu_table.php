<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhanKhuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_khu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_du_an')->index();
            $table->foreign('id_du_an')->references('id')->on('du_an');
            $table->char('ma');
            $table->text('ghi_chu')->nullable();
            $table->string('tinh_trang')->default('con');
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
        Schema::dropIfExists('phan_khu');
    }
}
