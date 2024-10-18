<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatphongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('datphong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('khachhang_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            // Foreign keys
    $table->foreign('khachhang_id')->references('id')->on('kh')->onDelete('cascade');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('datphong');
    }
}
