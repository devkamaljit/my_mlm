<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Demo',
            'username' => 'Test',
            'mobile' => '9876543210',
            'email' => 'demo@gmail.com',
            'password' => Hash::make('test'),
        ]);
        DB::table('teams')->insert([
            'sponsor' => '0',
            'user_id' => '1',
            
        ]);
        DB::table('wallets')->insert([
            'user_id' => '1',           
            
        ]);
        DB::table('incomes')->insert([
            'user_id' => '1',           
            
        ]);
    }
}
