<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TypeTableSeeder::class,
            UsersSeeder::class,
        ]);
        // $this->call();
        // $this->call();
        // \App\Models\User::factory(10)->create();
    }
}
