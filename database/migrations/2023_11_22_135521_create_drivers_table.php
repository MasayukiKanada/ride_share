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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('tel', 255);
            $table->string('zip', 7);
            $table->string('pref', 255);
            $table->string('town', 255);
            $table->string('address', 255);
            $table->date('birthday');
            $table->tinyInteger('gender');
            $table->string('password', 255);
            $table->string('driver_licence', 12);
            $table->text('own_car');
            $table->tinyInteger('own_capacity');
            $table->tinyInteger('accident');
            $table->tinyInteger('rank');
            $table->integer('basic_fee');
            $table->string('bank_name', 255);
            $table->string('bank_branch', 255);
            $table->string('bank_account', 255);
            $table->string('account_name', 255);
            $table->rememberToken();
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
        Schema::dropIfExists('drivers');
    }
};
