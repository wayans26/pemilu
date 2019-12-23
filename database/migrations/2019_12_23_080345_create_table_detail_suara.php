<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailSuara extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbdetailsuara', function (Blueprint $table) {
            $table->bigIncrements('id_detailsuara');
            $table->string('nim_kandidat', 10);
            $table->string('nim_pemilih', 10);
            $table->timestamp('create_at')->useCurrent();
            $table->foreign('nim_kandidat')->references('nim')->on('tbkandidat');
            $table->foreign('nim_pemilih')->references('nim')->on('tbpemilih');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detailsuara');
    }
}
