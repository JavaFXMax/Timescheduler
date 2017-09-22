<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('logo')->unique()->nullable();
            $table->string('website')->unique()->nullable();
            $table->string('address')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamps();
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->boolean('pwd_changed')->default(0);
            $table->string('password');
            $table->date('last_login');
            $table->integer('institution_id')->unsigned();
			$table->foreign('institution_id')->references('id')->on('institutions') ->onDelete('cascade');
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
        Schema::dropIfExists('institutions');
        Schema::dropIfExists('users');
    }
}
