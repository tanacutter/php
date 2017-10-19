<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePractitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioners', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('admin_users_id');
            $table->integer('prefecture_id');
            $table->integer('district_id');
            $table->integer('station_id');
            $table->integer('st_line_id');
            $table->string('pr_text');
            $table->string('belong_to');
            $table->string('regular_holiday');
            $table->string('business_hour');
            $table->string('experience_years');
            $table->integer('credit_card');
            $table->integer('parking');
            $table->string('gender');
            $table->string('notes');
            
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
        Schema::dropIfExists('practitioners');
    }
}
