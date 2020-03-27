<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tieude');
            $table->string('tenkhongdau');
            $table->text('img');
            $table->mediumText('tomtat');
            $table->mediumText('noidung');
            $table->integer('slide');
            $table->integer('thongbaochinh');
            $table->unsignedBigInteger('idLoaiTin');
            $table->foreign('idLoaiTin')->references('id')->on('loaitin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tintuc');
    }
}
