<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('jawatan_pemohon');
            $table->string('gred_pemohon');
            $table->string('jabatan_pemohon');
            $table->string('no_pekerja')->nullable();
            $table->string('jenis_tablet')->nullable();
            $table->decimal('harga_belian', 6, 2);
            $table->date('tarikh_belian')->nullable();
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
        Schema::dropIfExists('permohonan');
    }
}
