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
        Schema::create('clinic_history', function (Blueprint $table) {
            $table->id();
            $table->integer('id_patient')->unique();
            $table->string('names_patient', 200);
            $table->string('lastnames_patient', 200);
            $table->timestamp('birthday_patient');
            $table->enum('gender_patient', ['M','F']);
            $table->string('phone_patient');
            $table->string('address_patient', 250);
            $table->string('city_patient', 250);
            $table->enum('civilstatus_patient', ['single','married','widow']);
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
        Schema::dropIfExists('clinic_history');
    }
};
