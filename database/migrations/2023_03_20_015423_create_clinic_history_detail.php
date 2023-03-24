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
        Schema::create('clinic_history_detail', function (Blueprint $table) {
            $table->bigIncrements('id_detail');
            $table->integer('id_patient');
            $table->timestamp('timestamp_ch_detail');
            $table->string('reason_ch_detail', 500);
            $table->integer('weight_ch_detail');
            $table->float('height_ch_detail', 8, 2);
            $table->string('recommendation_ch_detail', 500);
            $table->foreign('id_patient')->references('id_patient')->on('clinic_history');
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
        Schema::dropIfExists('clinic_history_detail');
    }
};
