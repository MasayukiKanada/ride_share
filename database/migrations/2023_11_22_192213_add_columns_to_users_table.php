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
        Schema::table('users', function (Blueprint $table) {
            $table->string('tel', 255)->after('email_verified_at');
            $table->string('zip', 7)->after('tel');
            $table->string('pref', 255)->after('zip');
            $table->string('town', 255)->after('pref');
            $table->string('address', 255)->after('town');
            $table->date('birthday')->after('address');
            $table->tinyInteger('gender')->after('birthday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
