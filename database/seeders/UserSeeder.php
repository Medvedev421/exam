<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Администратор',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'Тестовый пользователь',
                'password' => Hash::make('user123'),
                'is_admin' => false,
            ]
        );
    }
}
