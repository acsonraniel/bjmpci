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
            $table->longText('crime');
            $table->integer('min_year')->default(0)->nullable();
            $table->integer('min_month')->default(0)->nullable();
            $table->integer('min_day')->default(0)->nullable();
            $table->integer('max_year')->default(0)->nullable();
            $table->integer('max_month')->default(0)->nullable();
            $table->integer('max_day')->default(0)->nullable();
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
