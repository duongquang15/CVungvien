<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('job_id')->nullable();
            $table->string('cv')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('priority')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->string('change')->nullable();
            $table->string('person_change')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
