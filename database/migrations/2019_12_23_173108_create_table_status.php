<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbstatus', function (Blueprint $table) {
            $table->bigIncrements('id_status');
            $table->string('nim', 10);
            $table->string('ip_address', 20);
            $table->string('status', 25);
            $table->timestamps();
            $table->foreign('nim')->references('nim')->on('tbpemilih');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbstatus');
    }
}
