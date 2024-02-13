<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_crime', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('group');
            $table->text('crime');
            $table->integer('min_year');
            $table->integer('min_month');
            $table->integer('min_day');
            $table->integer('max_year');
            $table->integer('max_month');
            $table->integer('max_day');
            $table->boolean('bailable')->default(false);
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
        Schema::dropIfExists('tbl_crime');
    }
}
