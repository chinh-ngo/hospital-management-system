<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'password'=> Hash::make('adminadmin'),
                'role'=>'superAdmin'
            ],
            [
                'name'=>'user',
                'email'=>'user@user.com',
                'password'=> Hash::make('useruser'),
                'role'=>'doctor'
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
