<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('first_name', 190);
            $table->string('last_name', 190);
            $table->string('email', 100);
            $table->string('country', 100)->default('Australia');
            $table->string('city', 100);
            $table->string('username', 100);
            $table->enum('gender', ['male', 'female'])->default('male')->nullable();
            $table->string('phone', 20)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
