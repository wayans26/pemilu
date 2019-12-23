<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePemilih extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbpemilih', function (Blueprint $table) {
            $table->string('nim', 10);
            $table->string('nama_lengkap', 100);
            $table->string('_password', 200);
            $table->tinyInteger('status_memilih')->default(0);
            $table->tinyInteger('status_register')->default(0);
            $table->string('level', 20);
            $table->timestamp('create_at')->useCurrent();
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
        Schema::dropIfExists('table_pemilih');
    }
}
