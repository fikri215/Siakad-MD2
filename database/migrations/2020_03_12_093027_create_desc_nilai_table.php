<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desc_nilai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('guru_id');
            $table->integer('kkm');
            $table->text('deskripsi_a');
            $table->text('deskripsi_b');
            $table->text('deskripsi_c');
            $table->text('deskripsi_d');
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
        Schema::dropIfExists('desc_nilai');
    }
}
