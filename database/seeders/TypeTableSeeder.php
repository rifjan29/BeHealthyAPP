<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();
        DB::table('type')->insert([
        [
            'type' => 'Olahraga Ringan',
            'created_at' => $date,
            'updated_at' => $date
        ],
        [
            'type' => 'Yoga',
            'created_at' => $date,
            'updated_at' => $date
        ],
        [
            'type' => 'Meditasi',
            'created_at' => $date,
            'updated_at' => $date
        ]
    ]);
    }
}
