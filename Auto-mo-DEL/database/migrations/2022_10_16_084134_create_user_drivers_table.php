<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('user_driver_models');

        Schema::create('user_drivers', function (Blueprint $table) {
            $table->id();
            $table->enum('accountType',['Client','Driver']);
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            $table->integer('age')->unsigned();
            $table->enum('gender',['Male','Female']);
            $table->char('contactNumber',11);
            $table->string('license');
            $table->string('birthCertificate');
            $table->integer('numberOfExperience');
            $table->string('vehicleType');
            $table->integer('numberOfExperience');
            $table->integer('availability');
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
        Schema::dropIfExists('user_drivers');

    }
};
