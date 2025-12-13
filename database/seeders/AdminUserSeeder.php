<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@albalahy4u.com')->exists()) {
            User::create([
                'name' => 'Said Albalahy',
                'email' => 'admin@albalahy4u.com',
                'password' => Hash::make('password'),
            ]);
            $this->command->info('Admin user created: admin@albalahy4u.com / password');
        }
    }
}
