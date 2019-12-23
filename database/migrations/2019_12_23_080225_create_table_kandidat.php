<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKandidat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbkandidat', function (Blueprint $table) {
            $table->string('nim', 10);
            $table->string('nama_lengkap', 100);
            $table->string('jurusan', 50);
            $table->string('photo',200);
            $table->primary('nim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbkandidat');
    }
}
