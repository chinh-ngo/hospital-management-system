<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('card_num');
            $table->string('name');
            $table->integer('age');
            $table->integer('insurance_id');
            $table->string('address');
            $table->string('state');
            $table->string('phone_num');
            $table->string('email');
            $table->string('king_phone');
            $table->string('blood_g');
            $table->string('upload_file');


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
        Schema::dropIfExists('patients');
    }
}
