<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSinhvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhvien', function (Blueprint $table) {
            $table->id();
            $table->string('masv');
            $table->string('hosv');
            $table->string('tensv');
            $table->date('ngaysinh');
            $table->integer('gioitinh');
            $table->string('diachi');
            $table->string('quequan');
            $table->unsignedBigInteger('idLop');
            $table->foreign('idLop')->references('id')->on('lop');
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
        Schema::dropIfExists('sinhvien');
    }
}
