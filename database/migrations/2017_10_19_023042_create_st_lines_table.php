<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_lines', function (Blueprint $table) {
            $table->integer('line_cd')->unique();
            $table->integer('company_cd');
            $table->string('line_name');
            $table->string('line_name_k')->nullable();
            $table->string('line_name_h')->nullable();
            $table->integer('line_color_c')->nullable();
            $table->string('line_color_t')->nullable();
            $table->integer('line_type')->nullable();
            $table->float('lon')->nullable();
            $table->float('lat')->nullable();
            $table->integer('zoom')->nullable();
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
        Schema::dropIfExists('st_lines');
    }
}
