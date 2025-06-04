<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $now = now();
        // User::create([
        //     'name' => 'Admin',
        //     'username' => 'mas admin',
        //     'email' => 'admin@example.com',
        //     'phone' => '08123456789',
        //     'role' => 'admin',
        //     'email_verified_at' => $now,
        //     'password' => Hash::make('password'),
        //     'created_at' => $now
        // ]);
        // $now = now();
        // User::create([
        //     'name' => 'Operator',
        //     'username' => 'mas operator',
        //     'email' => 'operator@example.com',
        //     'phone' => '081234567890',
        //     'role' => 'operator',
        //     'email_verified_at' => $now,
        //     'password' => Hash::make('password'),
        //     'created_at' => $now
        // ]);
        $now = now();
        User::create([
            'name' => 'User',
            'username' => 'mas user',
            'email' => 'user@example.com',
            'phone' => '081234567891',
            'role' => 'user',
            'email_verified_at' => $now,
            'password' => Hash::make('password'),
            'created_at' => $now
        ]);
    }
}
