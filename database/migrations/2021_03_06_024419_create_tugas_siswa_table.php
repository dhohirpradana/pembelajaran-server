<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_siswa', function (Blueprint $table) {
            $table->id();
            $table->text("link");
            $table->unsignedBigInteger("siswa_id");
            $table->unsignedBigInteger("tugas_id");

            $table->foreign("tugas_id")->references("id")->on("tugas")->onDelete("cascade");
            $table->foreign("siswa_id")->references("id")->on("siswa")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas_siswa');
    }
}
