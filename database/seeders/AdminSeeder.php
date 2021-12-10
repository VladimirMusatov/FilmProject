<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Vladimir',
            'email'=>'Vladimir@gmail.com',
            'password' => Hash::make('123456789'),
            ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'guard_name' => 'admin',
        ]);

        DB::table('roles')->insert([
            'name'=> 'user',
            'guard_name' => 'user',
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => '1',
            'model_type' => 'App\Models\User',
            'model_id' =>'1'
        ]);
    }
}
