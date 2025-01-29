<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin Mundo Web',
            'email' => 'hola@mundoweb.pe',
            'password' => Hash::make('12345678'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Admin Redconex',
            'email' => 'info@redconex.pe',
            'password' => Hash::make('redconex2025#'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Customer Mundo Web',
            'email' => 'customer@mundoweb.pe',
            'password' => Hash::make('12345678'),
        ])->assignRole('Customer');
    }
}
