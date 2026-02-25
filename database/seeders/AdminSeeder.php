<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
       
        'email' => 'admin@gmail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('admin@123'),
        'role' => 1, // Admin
        'firm_name' => 'London Law HQ',
        'contact_name' => 'Admin User',
        'contact_email' => null,
        'post_code' => null,
        'address_line_1' => null,
        'address_line_2' => null,
        'country' => null,
        'town' => null,
        'telephone' => null,
    ]);
    }
}
