<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoSoponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_soponsors', function (Blueprint $table) {
            $table->id();
            $table->string('Country');
            $table->string('FullName');
            $table->string('ContactPerson');
            $table->string('Address');
            $table->string('FirstTel');
            $table->string('SecondTel');
            $table->string('Email');
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
        Schema::dropIfExists('co_soponsors');
    }
}
