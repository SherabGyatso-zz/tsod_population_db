<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('person_name');
            $table->enum('gender', array('M', 'F', 'O'));
            $table->date('dob');
            $table->string('fname');
            $table->string('mname');
            $table->string('gbno');
            $table->string('rcno');
            $table->string('passportno');
            $table->tinyInteger('occupation_id');
            $table->tinyInteger('settlement_id');
            $table->tinyInteger('sponsorship_id');
            $table->tinyInteger('person_group');
            $table->binary('image');
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
        Schema::dropIfExists('profiles');
    }
}
