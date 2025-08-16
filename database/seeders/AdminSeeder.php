<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_panel')->insert([[

           'email' => 'admin1@bidmaster.com',
            'password' => 'password123',
            'created_at' => now(),
            'updated_at' => now(),
        ], [

            'email' => 'admin2@bidmaster.com',
            'password' => 'password1234',
            'created_at' => now(),
            'updated_at' => now(),

        ]    
        ]);
    }
}
