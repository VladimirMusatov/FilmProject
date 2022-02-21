<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        $user = User::create([
            'name' => 'User',
            'email' => 'User@gmail.com',
            'password' => Hash::make('123456789'), 
            ]);

        Role::create([
            'name' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('detail_users')->insert([
            'user_id' =>'2',
            'description' => 'Краткое описание',
            'user_img' => 'images.jfif',
            'back_img' => 'Rectangle 3.png',
        ]);

        DB::table('statistics')->insert([
            'user_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

            $user->assignRole('user');


    }
}
