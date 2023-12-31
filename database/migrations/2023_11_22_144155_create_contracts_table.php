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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('driver_id')->constrained('drivers');
            $table->date('con_date');
            $table->string('con_on_place', 255);
            $table->time('con_on_time');
            $table->string('con_off_place', 255);
            $table->time('con_off_time');
            $table->tinyInteger('con_number');
            $table->string('con_car', 255);
            $table->integer('con_fee');
            $table->tinyInteger('con_eva')->nullable();
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
        Schema::dropIfExists('contracts');
    }
};
