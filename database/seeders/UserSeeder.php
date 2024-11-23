<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        info('Since users table have not so much data. you can safely truncate as of now.');
        sleep(5000);
        DB::table('users')->truncate();
        User::factory()->create();
    }
}
