<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('IdCard');
            $table->integer('IdCardNumber');
            $table->string('FullName');
            $table->string('Gov');
            $table->string('City');
            $table->string('Dist');
            $table->string('AddressDetails');
            $table->string('Tel');
            $table->string('Mobile');
            $table->string('Email');
            $table->string('Nationality');
            $table->string('Country');
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
        Schema::dropIfExists('sponsors');
    }
}
