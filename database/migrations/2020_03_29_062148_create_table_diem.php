<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDiem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idSV');
            $table->unsignedBigInteger('idMonHoc');
            $table->float('chuyencan')->nullable();
            $table->float('thuongxuyen')->nullable();
            $table->float('giuaky')->nullable();
            $table->float('cuoiky')->nullable();
            $table->foreign('idSV')->references('id')->on('sinhvien');
            $table->foreign('idMonHoc')->references('id')->on('monhoc');
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
        Schema::dropIfExists('diem');
    }
}
