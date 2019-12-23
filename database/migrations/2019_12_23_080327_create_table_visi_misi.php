<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVisiMisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbvisimisi', function (Blueprint $table) {
            $table->bigIncrements('id_visimisi');
            $table->string('nim', 10);
            $table->string('visi', 2000);
            $table->string('misi', 2000);
            $table->timestamp('create_at')->useCurrent();
            $table->foreign('nim')->references('nim')->on('tbkandidat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbvisimisi');
    }
}
