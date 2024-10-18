<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('loaiphong_id')->unsigned();
            $table->string('tenphong');
            $table->boolean('trangthai')->nullable();
            $table->text('chuthich')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('soluong')->default(0);
            $table->timestamps();
             // Foreign keys
    $table->foreign('loaiphong_id')->references('id')->on('loaiphong')->onDelete('cascade');
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
        Schema::dropIfExists('phong');
    }
}
