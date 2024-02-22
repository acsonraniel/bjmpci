<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->id();
            $table->string('rank')->nullable();
            $table->string('name')->nullable();
            $table->string('office')->nullable();
            $table->string('region')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role');
            $table->boolean('is_user')->default(false);
            $table->timestamp('user_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
