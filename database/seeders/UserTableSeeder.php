<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'William',
            'email' => 'william123@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'cedula' => '01233155464',
            'phone' => '3134743140',
            'role' => 'admin',
        ]);

        User::factory()
            ->count(50)
            ->create();
    }
}
