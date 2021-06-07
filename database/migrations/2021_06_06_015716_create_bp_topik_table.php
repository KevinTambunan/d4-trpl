<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBpTopikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bp_topik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("bahasa_pemograman_id");
            $table->string("judul");
            $table->integer("estimasi");
            $table->string("level");
            $table->string("link");
            $table->foreign('bahasa_pemograman_id')->references('id')->on('bahasa_pemograman');
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
        Schema::dropIfExists('bp_topik');
    }
}
