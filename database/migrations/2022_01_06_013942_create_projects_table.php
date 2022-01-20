<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->date('awarddate');
            $table->string('title');
            $table->string('contractor');
            $table->string('user_id');
            $table->integer('state_id');
            $table->string('objectives');
            $table->float('percentcomplete');
            $table->float('retention');
            $table->date('commendate');
            $table->date('completedate');
            $table->string('direct');
            $table->string('indirect');
            $table->string('induced');

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
        Schema::dropIfExists('projects');
    }
}
