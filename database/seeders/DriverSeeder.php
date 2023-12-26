<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drivers')->insert([
            'name' => 'デモドライバー',
            'email' => 'driver@sample.com',
            'tel' => '090-9999-9999',
            'zip' => '8888888',
            'pref' => '兵庫県',
            'town' => '神崎郡神河町',
            'address' => '鍛冶111',
            'birthday' => '1999-9-9',
            'gender' => 0,
            'password' => Hash::make('password123'),
        ]);
        \App\Models\Driver::factory(30)->create();
    }
}
