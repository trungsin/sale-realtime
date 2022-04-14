<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatDongSanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bat_dong_san', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_khu');
            $table->unsignedBigInteger('id_du_an');
            $table->char('ma_lo');
            $table->string('thong_tin')->nullable();
            $table->string('dien_tich')->nullable();
            $table->float('gia', 15, 2)->default(0);
            $table->float('coc', 15, 2)->default(0);
            $table->string('ho_ten_khach_hang_dat_coc')->nullable();
            $table->string('so_cmnd_khach_hang_dat_coc')->nullable();
            $table->text('ghi_chu_dat_coc')->nullable();
            $table->string('ho_ten_khach_hang_dat_cho')->nullable();
            $table->string('so_cmnd_khach_hang_dat_cho')->nullable();
            $table->string('tinh_trang')->default('con');
            $table->unsignedBigInteger('id_user_coc')->nullable();
            $table->unsignedBigInteger('id_user_dat_cho')->nullable();
            $table->dateTime('ngay_coc', 0)->nullable();
            $table->dateTime('ngay_dat_cho', 0)->nullable();
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
        Schema::dropIfExists('bat_dong_san');
    }
}
