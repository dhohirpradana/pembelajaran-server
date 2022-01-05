<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_jawaban', function (Blueprint $table) {
            $table->id();
            $table->string("jawaban");
            $table->integer("benar")->default(0);
            $table->unsignedBigInteger("game_soal_id");

            $table->foreign("game_soal_id")->references("id")->on("game_soal")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_jawaban');
    }
}
