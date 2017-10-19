<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePractitionerMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioner_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('practitioners_id');
            $table->integer('menu_categories_id');
            $table->string('name');
            $table->string('description');
            $table->integer('time');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practitioner_menus');
    }
}
