<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = 'admin';
        $addUser = new \App\Models\User;

        $addUser->name = 'Rifjan';
        $addUser->username = 'admin';
        $addUser->gender = 'L';
        $addUser->password = \Hash::make($pass);
        $addUser->save();
    }
}
