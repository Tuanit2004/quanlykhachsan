<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChitietdatphongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('chitietdp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('datphong_id')->unsigned();
            $table->bigInteger('loaiphong_id')->unsigned();
            $table->bigInteger('sophong')->default(0);
            $table->string('tenphong');
            $table->string('tenloaiphong');
            $table->timestamps();
            // Foreign keys
    $table->foreign('datphong_id')->references('id')->on('datphong')->onDelete('cascade');
    $table->foreign('loaiphong_id')->references('id')->on('loaiphong')->onDelete('cascade');
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
        Schema::dropIfExists('chitietdp');
    }
}
