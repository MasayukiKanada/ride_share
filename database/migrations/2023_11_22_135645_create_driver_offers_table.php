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
        Schema::create('driver_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers');
            $table->date('offer_date');
            $table->string('offer_on_place', 255);
            $table->time('offer_on_time');
            $table->string('offer_off_place', 255);
            $table->time('offer_off_time');
            $table->string('offer_car', 255);
            $table->tinyInteger('offer_capacity');
            $table->integer('offer_fee');
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
        Schema::dropIfExists('driver_offers');
    }
};
