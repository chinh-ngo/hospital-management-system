<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('visit_date');
            $table->string('project_location');
            $table->string('percentage_completion');
            $table->string('challenges');
            $table->string('recommendations');
            $table->string('upload_document');
            $table->string('supervisor_division');
            $table->string('supervision_location');
            $table->string('impact_project');
            $table->string('zonal_comment');
            $table->string('divisional_comment');
            $table->string('hod_comment');

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
        Schema::dropIfExists('reports');
    }
}
