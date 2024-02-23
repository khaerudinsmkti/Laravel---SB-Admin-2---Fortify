<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Khaerudin',
            'last_name' => 'IT',
            'email' => 'khaerudin@outlook.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
