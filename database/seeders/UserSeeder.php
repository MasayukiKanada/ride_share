<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'デモユーザー',
            'email' => 'user@sample.com',
            'tel' => '080-8888-88880',
            'zip' => '1111111',
            'pref' => '兵庫県',
            'town' => '神崎郡神河町',
            'address' => '鍛冶888',
            'birthday' => '2000-12-12',
            'gender' => 1,
            'password' => Hash::make('password123'),
        ]);
        \App\Models\User::factory(30)->create();
    }
}
