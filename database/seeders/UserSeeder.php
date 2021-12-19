<?php

namespace Database\Seeders;

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
            'name'=>'User',
            'email'=>'User@gmail.com',
            'password' => Hash::make('123456789'),
            ]);

        DB::table('model_has_roles')->insert([
            'role_id' => '2',
            'model_type' => 'App\Models\User',
            'model_id' =>'1'
        ]);
    }
}
