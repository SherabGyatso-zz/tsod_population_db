<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->enum('type', ['Admin', 'Sub Admin']);
            $table->tinyInteger('profile_view_access');
            $table->tinyInteger('profile_edit_access');
            $table->tinyInteger('profile_full_access');
            $table->tinyInteger('occupation_access')->default(0);
            $table->tinyInteger('sponsorship_access')->default(0);
            $table->tinyInteger('settlement_access')->default(0);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('admins');
    }
}
