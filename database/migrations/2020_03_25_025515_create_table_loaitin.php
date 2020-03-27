<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLoaitin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaitin', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tenloaitin');
            $table->string('tenkhongdau');
            $table->integer('menu');
            $table->integer('gioithieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaitin');
    }
}
