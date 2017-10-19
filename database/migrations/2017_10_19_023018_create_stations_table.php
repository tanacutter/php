<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->integer('station_cd')->unique();
            $table->integer('station_g_cd');
            $table->string('station_name');
            $table->string('station_name_k')->nullable();
            $table->string('station_name_r')->nullable();
            $table->integer('line_cd');
            $table->integer('pref_cd')->nullable();
            $table->string('post')->nullable();
            $table->string('add')->nullable();
            $table->float('lon')->nullable();
            $table->float('lat')->nullable();
            $table->date('open_ymd')->nullable();
            $table->date('close_ymd')->nullable();
            $table->integer('e_status')->nullable();
            $table->integer('e_sort')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
