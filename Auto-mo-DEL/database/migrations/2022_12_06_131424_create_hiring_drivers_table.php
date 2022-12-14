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
        Schema::create('hiring_drivers', function (Blueprint $table) {
            $table->id();
            $table->integer("clientID");
            $table->integer("driverID");
            $table->integer("activeInd");
            $table->boolean("isPending")->default(true);
            $table->boolean("isDeleted")->default(false);
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
        Schema::dropIfExists('hiring_drivers');
    }
};
