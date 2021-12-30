<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableProfileMail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_mail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mail_profile');
            $table->timestamps();
        });
        Schema::create('email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten');
            $table->string('status');
            $table->string('download_app');
            $table->string('download_book');
            $table->string('send_mail');
            $table->string('add_paymment');
            $table->integer('id_pm')->unsigned();
            $table->foreign('id_pm')->references('id')->on('profile_mail');
            $table->timestamps();
        });
        Schema::create('action', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action');
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
        //
    }
}
