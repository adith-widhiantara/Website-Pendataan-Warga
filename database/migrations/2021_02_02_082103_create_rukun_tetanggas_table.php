<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRukunTetanggasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rukun_tetanggas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rukun_wargas_id');
            $table->string('nomor');
            $table->unsignedBigInteger('users_id');
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
        Schema::dropIfExists('rukun_tetanggas');
    }
}
