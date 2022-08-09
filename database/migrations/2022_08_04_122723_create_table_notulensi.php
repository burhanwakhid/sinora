<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notulensi', function (Blueprint $table) {
            $table->id();
            $table->string('kegiatan');
            //datetime
            $table->dateTime('tanggal');
            $table->time('waktu');
            $table->string('tempat');
            $table->string('pemimpin_kegiatan');
            //peserta
            $table->string('peserta');
            $table->string('dokumentasi')->nullable();
            // notulensi
            $table->text('notulensi');
            $table->integer('id_user')->index();
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
        Schema::dropIfExists('table_notulensi');
    }
};
