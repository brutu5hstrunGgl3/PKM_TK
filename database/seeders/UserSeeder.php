<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          User::create([
            'name' => 'Admin Tk Harapan Ibu',
            'email' => 'admin@tkharapanibu.com',
            'email_verified_at' => now(),
            'password' => Hash::make('4dM1ni13utk'),
            

        ]);
    }
}
